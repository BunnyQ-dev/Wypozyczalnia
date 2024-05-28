<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
        ]);

        return redirect()->route('login')->with('success', 'Rejestracja zakończona pomyślnie. Zaloguj się.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jeśli uwierzytelnienie się powiodło, przekieruj na odpowiednią stronę
            return redirect()->intended('home');
        }

        // Jeśli uwierzytelnienie się nie powiodło, przekieruj z powrotem do formularza logowania z komunikatem błędu
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'Nieprawidłowy adres email lub hasło.',
        ]);
    }
}
