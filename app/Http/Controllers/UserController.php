<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('uzytkownicy.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('uzytkownicy.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('uzytkownicy.index')->with('success', 'Użytkownik zaktualizowany pomyślnie');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('uzytkownicy.index')->with('success', 'Użytkownik usunięty pomyślnie');
    }
}
