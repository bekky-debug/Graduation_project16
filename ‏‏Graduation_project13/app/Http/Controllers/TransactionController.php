<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function transaction()
    {
        return view('Transaction');
    }


    public function store(Request $request)
    {
        $request->validate([
            'currency' => 'required',
            'wallet_address' => 'required',
            'amount' => 'required',
            'fee' => 'required',
        ]);

        $tran = new Transaction();
        $tran->currency = $request->currency;
        $tran->wallet_address = $request->wallet_address;
        $tran->amount = $request->amount;
        $tran->fee = $request->fee;
        $tran->user_id = Auth::id();
        $tran->save();
        return redirect()->back()->with('success', 'تم الإرسال');
    }

}
