<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use Illuminate\Http\Request;


class ExchangeController extends Controller
{
    public function process(Request $request)
    {
        // أولاً: التحقق من البيانات المُدخلة
        $request->validate([
            'from_currency' => 'required|string',
            'to_currency' => 'required|string|different:from_currency',
            'amount' => 'required|numeric|min:0.00000001',
        ]);

        // ثانياً: حساب السعر والقيمة المحوّلة
        $rate = 28000; // سعر ثابت كمثال
        $converted = $request->amount * $rate;

        // ثالثاً: حفظ البيانات في قاعدة البيانات
        ExchangeRate::create([
            'from_currency' => $request->from_currency,
            'to_currency' => $request->to_currency,
            'amount' => $request->amount,
            'rate' => $rate,
            'converted_amount' => $converted,
        ]);


        // رابعاً: عرض رسالة نجاح
        return back()->with('success', 'تم التحويل بنجاح! القيمة المحوّلة: ' . number_format($converted, 2));
    }


}
