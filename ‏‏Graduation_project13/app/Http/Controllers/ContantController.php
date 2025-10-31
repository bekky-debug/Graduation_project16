<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContantController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'message' => 'required',
        ]);

        $con= new Contact();
            $con->name = $request->name;
            $con->email = $request->email;
            $con->message = $request->message;
            $con->save();


        return back()->with('success', 'تم الارسال ');
    }
}
