<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route('profile.home');
        }

        return back()->withErrors([
            'email' => 'Incorrect email or password.',
        ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
        ]);

        Auth::login($user);

        return redirect()->route('profile.home');
    }

    public function index()       { return view('index'); }
    public function exchangePage()
    {
        return view('exchange');
    }
    public function transaction() { return view('Transaction'); }
    public function wallet()      { return view('wallet'); }
    public function faq()         { return view('faq'); }
    public function bitcoin()     { return view('bitcoin'); }
    public function eth()         { return view('eth'); }
    public function USTD()        { return view('ustd'); }




    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }


    public function exchange()
    {
        return view('exchange');
    }

    public function edit()
    {
        return view('edit_profile'); // أو اسم الملف الصحيح
    }




}
