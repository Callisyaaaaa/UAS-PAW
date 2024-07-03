<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        if (auth()->attempt($request->only('username', 'password'))) {
            return redirect('/stok');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
