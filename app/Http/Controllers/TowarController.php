<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towar;
use App\Models\Kategoria;
use App\Models\User;

class TowarController extends Controller
{
    public function index()
    {
        $towary = Towar::with('kategoria')->get();
        return view('towary.index', compact('towary'));
    }

    public function create()
    {
        // Sprawdź, czy zalogowany użytkownik jest administratorem
        if (auth()->user()->role === 'admin') {
            $kategorie = Kategoria::all();
            $users = User::all(); // Pobierz listę użytkowników
            return view('towary.create', compact('kategorie', 'users'));
        } else {
            // Jeśli zalogowany użytkownik nie jest administratorem, przekieruj go na inną stronę lub wyświetl komunikat o braku uprawnień
            return redirect()->route('home')->with('error', 'Nie masz uprawnień do dodawania towarów.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required',
            'opis' => 'nullable',
            'cena' => 'required|numeric',
            'kategoria_id' => 'required|exists:kategoria,id',
        ]);

        // Utwórz nowy towar
        $towar = new Towar();
        $towar->nazwa = $request->nazwa;
        $towar->opis = $request->opis;
        $towar->cena = $request->cena;
        $towar->kategoria_id = $request->kategoria_id;

        // Jeśli zalogowany użytkownik jest administratorem i wybrano użytkownika, przypisz towar do użytkownika
        if (auth()->user()->role === 'admin' && $request->has('user_id')) {
            $towar->user_id = $request->user_id;
        }

        // Zapisz towar
        $towar->save();

        return redirect()->route('towary.index')->with('success', 'Towar został dodany pomyślnie.');
    }

    public function destroy($id)
    {
        $towar = Towar::findOrFail($id);
        $towar->delete();

        return redirect()->route('towary.index')->with('success', 'Towar został usunięty pomyślnie.');
    }
}
