<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\WalletRequest;
use App\Models\WalletCurrency;
use Illuminate\Support\Facades\DB;


class WalletRequestController extends Controller
{
    public function index(){
        $requests = auth()->user()->walletRequests()->with('walletCurrency')->latest()->paginate(12);
        return view('admin.wallet.requests.index', compact('requests'));
    }


    public function create() {
        // جلب كل العملات
        $currencies = \App\Models\Currency::all();

        return view('admin.wallet.requests.create', compact('currencies'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'currency_id' => 'required|exists:currencies,id',
            'amount' => 'required|numeric|min:0.00000001',
            'receipt' => 'nullable|file|mimes:jpg,png,pdf|max:2048'
        ]);

        $user = auth()->user();
        $wallet = $user->wallet ?? $user->wallet()->create([]);

        $filePath = null;
        if ($r->hasFile('receipt')) {
            $filePath = $r->file('receipt')->store('receipts', 'public');
        }

        DB::transaction(function () use ($r, $wallet, $filePath, $user) {
            // تأكد من وجود WalletCurrency
            $walletCurrency = \App\Models\WalletCurrency::firstOrCreate(
                ['wallet_id' => $wallet->id, 'currency_id' => $r->currency_id],
                [
                    'balance' => 0,
                    'pending_balance' => 0,
                    'user_id' => $user->id ,
                ]
            );


            // إنشاء الطلب داخل الترانزكشن
            $req = \App\Models\WalletRequest::create([
                'user_id' => $user->id,
                'wallet_currency_id' => $walletCurrency->id,
                'amount' => $r->amount,
                'reference' => $r->reference ?? null,
                'receipt_path' => $filePath
            ]);

            // تحديث الرصيد المعلق
            $wc = \App\Models\WalletCurrency::where('id', $walletCurrency->id)->lockForUpdate()->first();
            $wc->pending_balance = bcadd($wc->pending_balance, $req->amount, 8);
            $wc->save();
        });

        return redirect()->route('wallet.requests.index')->with('success', 'Top-up request submitted. Waiting for approval.');
    }




    public function show(WalletRequest $request){
        $this->authorize('view', $request);
        $request->load('walletCurrency','approver');
        return view('wallet.requests.show', compact('request'));
    }
}
