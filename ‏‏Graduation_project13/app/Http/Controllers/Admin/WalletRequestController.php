<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\WalletRequest;
use App\Models\Transaction;

/**
 * Admin controller to manage wallet top-up requests.
 *
 * Routes expected (example):
 *  GET    /admin/wallet/requests                 -> index
 *  GET    /admin/wallet/requests/{request}       -> show
 *  POST   /admin/wallet/requests/{request}/approve -> approve
 *  POST   /admin/wallet/requests/{request}/reject  -> reject
 *
 * Make sure routes are protected by auth and a gate like `can:manage-wallet-requests`.
 */
class WalletRequestController extends Controller
{
    /**
     * Apply middleware (auth + gate) here so routes are protected.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'can:manage-wallet-requests']);
    }

    /**
     * Display a paginated list of wallet requests for admin.
     *
     * Supports optional filters via query string: status, currency, user
     */
    public function index(Request $request)
    {
        $q = WalletRequest::query()->with(['user', 'walletCurrency.currency', 'approver']);

        if ($request->filled('status')) {
            $q->where('status', $request->status);
        }

        if ($request->filled('currency')) {
            // assume currency filter by symbol or id; adapt as needed
            $symbol = $request->currency;
            $q->whereHas('walletCurrency.currency', function ($q2) use ($symbol) {
                $q2->where('symbol', $symbol)->orWhere('id', $symbol);
            });
        }

        if ($request->filled('user')) {
            $term = $request->user;
            $q->whereHas('user', function ($u) use ($term) {
                $u->where('name', 'like', "%{$term}%")->orWhere('email', 'like', "%{$term}%");
            });
        }

        $requests = $q->latest()->paginate(20)->withQueryString();

        return view('admin.wallet.requests.index', compact('requests'));
    }

    /**
     * Show single request details.
     */
    public function show(WalletRequest $request)
    {
        // Eager load relations
        $request->load(['user', 'walletCurrency.currency', 'approver']);

        return view('admin.wallet.requests.show', [
            'request' => $request,
        ]);
    }

    /**
     * Approve a pending wallet request.
     *
     * This method:
     *  - validates input (optional admin_note)
     *  - verifies request is pending
     *  - inside DB transaction and lockForUpdate:
     *      - subtracts from pending_balance
     *      - adds to balance
     *      - marks request approved + approved_by
     *      - creates a Transaction record linked to request
     */
    public function approve(Request $httpRequest, WalletRequest $request)
    {
        // تأكيد أن الطلب ما زال معلق
        if ($request->status !== 'pending') {
            return back()->withErrors(['msg' => 'This request has already been processed.']);
        }

        try {
            DB::transaction(function () use ($httpRequest, $request) {

                // جلب صف WalletCurrency مع قفل للتحديث
                $wc = $request->walletCurrency()->lockForUpdate()->first();
                if (!$wc) {
                    throw new \Exception('Wallet currency row not found.');
                }

                // تحقق من أن الرصيد المعلق كافٍ
                if (bccomp($wc->pending_balance, $request->amount, 8) === -1) {
                    throw new \Exception('Insufficient pending balance to approve request.');
                }

                // ✅ خصم من pending_balance وإضافة إلى balance
                $wc->pending_balance = bcsub($wc->pending_balance, $request->amount, 8);
                $wc->balance = bcadd($wc->balance, $request->amount, 8);
                $wc->save();

                // ✅ تحديث حالة الطلب
                $request->status = 'approved';
                $request->approved_by = auth()->id();
                $request->admin_note = $httpRequest->input('admin_note');
                $request->save();

                // ✅ تسجيل العملية في جدول transactions
                Transaction::create([
                    'user_id' => $request->user_id,
                    'type' => 'topup',
                    'amount' => $request->amount,
                    'fee' => 0,
                    'currency' => $wc->currency->symbol,
                    'wallet_address' => $wc->wallet->address ?? 'N/A',
                    'related_request_id' => $request->id,
                ]);
            });

            return back()->with('success', 'Wallet top-up request approved successfully.');

        } catch (\Throwable $e) {
            Log::error('Error approving wallet request ID '.$request->id.': '.$e->getMessage(), [
                'exception' => $e,
                'request_id' => $request->id,
            ]);

            return back()->withErrors(['msg' => 'Error approving request: '.$e->getMessage()]);
        }
    }


    /**
     * Reject a pending wallet request.
     *
     * This method:
     *  - validates optional admin_note
     *  - inside DB transaction subtracts pending_balance and marks request rejected
     */
    public function reject(Request $httpRequest, WalletRequest $request)
    {
        $httpRequest->validate([
            'admin_note' => 'nullable|string|max:1000',
        ]);

        if ($request->status !== 'pending') {
            return back()->withErrors(['msg' => 'هذا الطلب تمّت معالجته مسبقاً.']);
        }

        try {
            DB::transaction(function () use ($httpRequest, $request) {
                $wc = $request->walletCurrency()->lockForUpdate()->first();

                if (!$wc) {
                    throw new \Exception('Wallet currency row not found.');
                }

                $scale = 8;
                $amount = (string) $request->amount;
                $pending = (string) $wc->pending_balance;

                // safety: pending >= amount
                if (bccomp($pending, $amount, $scale) === -1) {
                    // still try to correct state but throw afterwards
                    $wc->pending_balance = '0';
                } else {
                    $wc->pending_balance = bcsub($pending, $amount, $scale);
                }

                $wc->save();

                $request->status = 'rejected';
                $request->approved_by = Auth::id(); // storing who rejected as well
                $request->admin_note = $httpRequest->input('admin_note');
                $request->save();
            });

            // Optional: notify user about rejection
            // $request->user->notify(new \App\Notifications\WalletTopupRejected($request));

            return back()->with('success', 'تم رفض الطلب وإرجاع الحالة بنجاح.');
        } catch (\Throwable $e) {
            Log::error('Error rejecting wallet request ID '.$request->id.': '.$e->getMessage(), [
                'exception' => $e,
                'request_id' => $request->id,
            ]);

            return back()->withErrors(['msg' => 'حدث خطأ أثناء رفض الطلب: '.$e->getMessage()]);
        }
    }
}
