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

    public function show($id)
    {
        $user = User::findOrFail($id);

        // Перевірка, чи користувач має доступ до цього профілю
        if ($user->id !== auth()->id() && !auth()->user()->is_admin) {
            return redirect()->back()->with('error', 'У вас немає доступу до цього профілю');
        }

        return view('uzytkownicy.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255'
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('uzytkownicy.index')->with('success', 'Użytkownik zaktualizowany pomyślnie');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('uzytkownicy.index')->with('success', 'Użytkownik usunięty pomyślnie');
    }

    public function showForClient(User $user)
    {
        return view('klient.uzytkownicy.show', compact('user'));
    }

    public function editForClient(User $user)
    {
        // Method for client edit view
        return view('klient.uzytkownicy.edit', compact('user'));
    }

    public function updateForClient(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255'
        ]);

        $user = User::findOrFail($id);

        // Here you can add any additional client-specific validation or authorization logic if needed

        // Update the user
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('klient.uzytkownicy.show', $user->id)->with('success', 'Dane użytkownika zaktualizowane pomyślnie');
    }
}
