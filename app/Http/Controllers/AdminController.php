<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.login'); 
    }

    // Proses login
    public function login(Request $request)
{
    $request->validate([
        'user_name' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('user_name', 'password');

    // Cek kredensial dengan menggunakan username
    if (Auth::attempt($credentials)) {
        return redirect()->route('admin.dashboard')->with('success', 'Login berhasil');
    }

    return back()->withErrors(['user_name' => 'Username atau password salah']);
}

    // Logout
    public function logout()
    {
        Auth::logout(); // Logout user
        return redirect()->route('home'); // Redirect to the home page
    }
    public function dashboard()
{
    return view('admin.dashboard'); 
}

}
