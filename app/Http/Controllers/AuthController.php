<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('movies.login');
    }

    public function login(Request $request)
{

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:3',
    ]);


    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('movies.index')->with('success', 'Login successful!');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'Berhasil logout!');
}

}
