<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.change_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Aktualne hasło jest nieprawidłowe.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('klient.uzytkownicy.show', ['user' => $user])->with('success', 'Hasło zostało pomyślnie zmienione.');
    }
}
