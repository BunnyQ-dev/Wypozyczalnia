<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.uzytkownicy.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        if ($user->id !== Auth::id() && !Auth::user()->admin) {
            return redirect()->route('uzytkownicy.index')->with('error', 'You do not have permission to edit this user.');
        }

        return view('admin.uzytkownicy.edit', compact('user'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        if ($user->id !== Auth::id() && !Auth::user()->admin) {
            return redirect()->back()->with('error', 'You do not have access to this profile.');
        }

        return view('admin.uzytkownicy.show', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['username', 'first_name', 'last_name', 'address']));

        return redirect()->route('admin.uzytkownicy.show', $user->id)->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id !== Auth::id() && !Auth::user()->admin) {
            return redirect()->route('admin.uzytkownicy.index')->with('error', 'You do not have permission to delete this user.');
        }

        $user->delete();

        return redirect()->route('admin.uzytkownicy.index')->with('success', 'User deleted successfully.');
    }

    public function showForClient(User $user)
    {
        if ($user->id !== Auth::id() && !Auth::user()->admin) {
            return redirect()->route('klient.uzytkownicy.show', $user->id)->with('error', 'You do not have access to this profile.');
        }

        return view('klient.uzytkownicy.show', compact('user'));
    }

    public function editForClient(User $user)
    {
        if ($user->id !== Auth::id() && !Auth::user()->admin) {
            return redirect()->route('klient.uzytkownicy.index')->with('error', 'You do not have permission to edit this user.');
        }

        return view('klient.uzytkownicy.edit', compact('user'));
    }

    public function updateForClient(Request $request, User $user)
    {
        if ($user->id !== Auth::id()) {
            return redirect()->route('klient.uzytkownicy.show', $user->id)->with('error', 'You do not have permission to edit this user.');
        }

        $request->validate([
            'username' => 'required|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['username', 'first_name', 'last_name', 'address']));

        return redirect()->route('klient.uzytkownicy.show', $user->id)->with('success', 'Dane użytkownika zaktualizowane pomyślnie');
    }

}
