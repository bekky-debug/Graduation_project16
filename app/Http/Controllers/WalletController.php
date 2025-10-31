<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WalletCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{

    public function show()
    {
        $user = auth()->user();
        $wallet = $user->wallet;

        // إذا ما عنده محفظة، أنشئ له وحدة
        if (!$wallet) {
            $wallet = \App\Models\Wallet::create(['user_id' => $user->id]);
        }

        $balances = \App\Models\WalletCurrency::where('wallet_id', $wallet->id)
            ->with('currency')
            ->get()
            ->map(function ($wc) {
                return (object)[
                    'currency' => $wc->currency->symbol,
                    'total' => $wc->balance,
                    'pending' => $wc->pending_balance,
                ];
            });

        return view('wallet', compact('balances'));
    }



    public function showTransferForm()
    {
        $users = User::all();
        $currencies = Currency::all();
        return view('wallet.transfer', compact('users', 'currencies'));
    }

    // تنفيذ عملية التحويل
    public function transfer(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id|different:sender_id',
            'currency_id' => 'required|exists:currencies,id',
            'amount' => 'required|numeric|min:0.00000001',
        ]);

        $sender = User::find($request->sender_id);
        $receiver = User::find($request->receiver_id);
        $currency = Currency::find($request->currency_id);

        // تأكد من وجود محفظة للمرسل
        $senderWalletModel = $sender->wallet ?? $sender->wallet()->create();

        // جلب رصيد المرسل من محفظته
        $senderWallet = WalletCurrency::where('wallet_id', $senderWalletModel->id)
            ->where('currency_id', $currency->id)
            ->first();

        if (!$senderWallet || $senderWallet->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance.');
        }

        // تأكد من وجود محفظة للمستقبل
        $receiverWalletModel = $receiver->wallet ?? $receiver->wallet()->create();

        // جلب أو إنشاء رصيد المستقبل للعملة
        $receiverWallet = WalletCurrency::firstOrCreate(
            ['wallet_id' => $receiverWalletModel->id, 'currency_id' => $currency->id],
            ['balance' => 0, 'pending_balance' => 0]
        );

        DB::beginTransaction();
        try {
            // خصم من المرسل
            $senderWallet->balance = bcsub($senderWallet->balance, $request->amount, 8);
            $senderWallet->save();

            // إضافة للمستلم
            $receiverWallet->balance = bcadd($receiverWallet->balance, $request->amount, 8);
            $receiverWallet->save();

            // تسجيل العملية
            Transaction::create([
                'user_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'currency_id' => $currency->id,
                'currency' => $currency->symbol,
                'amount' => $request->amount,
                'fee' => 0,
                'related_request_id' => null,
                'wallet_address' => 'N/A',
                'status' => 'completed',
            ]);

            DB::commit();
            return back()->with('success', 'Transfer completed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Transfer failed: ' . $e->getMessage());
        }
    }



    // عرض المحفظة
    public function showWallet()
    {
        $user = auth()->user();

        $balances = DB::table('transactions')
            ->join('currencies', 'transactions.currency_id', '=', 'currencies.id')
            ->select('currencies.symbol', DB::raw('SUM(transactions.amount) as total'))
            ->where('transactions.user_id', $user->id)
            ->groupBy('currencies.symbol')
            ->get();

        return view('wallet', compact('balances'));
    }
}
