<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:login,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Login::create([
            'email' => $request->email,
            'level' => 'user',
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek kredensial dan login pengguna
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();  // Regenerasi session setelah login berhasil

            return redirect()->intended('/ortu');  // Redirect setelah login
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
