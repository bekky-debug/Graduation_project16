<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;

class WalletController extends Controller
{

    public function show()
    {
        $user = auth()->user();

        // جلب إجمالي الرصيد لكل عملة من العمليات
        $balances = Transaction::where('user_id', $user->id)
            ->selectRaw('currency, SUM(amount) as total')
            ->groupBy('currency')
            ->get();

        return view('wallet', compact('balances'));
    }


}
