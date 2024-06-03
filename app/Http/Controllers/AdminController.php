<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Walidacja danych z formularza
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Tworzenie nowego użytkownika
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Przekierowanie po dodaniu użytkownika
        return redirect()->route('admin.users.index')->with('success', 'Użytkownik został dodany pomyślnie.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Walidacja danych z formularza
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        // Aktualizacja danych użytkownika
        $user = User::findOrFail($id);
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        // Przekierowanie po zaktualizowaniu użytkownika
        return redirect()->route('admin.users.index')->with('success', 'Dane użytkownika zostały zaktualizowane pomyślnie.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Przekierowanie po usunięciu użytkownika
        return redirect()->route('admin.users.index')->with('success', 'Użytkownik został usunięty pomyślnie.');
    }

    // Inne metody dla administratora, np. dodawanie, edycja, usuwanie użytkowników, zarządzanie uprawnieniami itp.
}
