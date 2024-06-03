<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towar;
use App\Models\Kategoria;
use Illuminate\Support\Facades\Auth;

class TowarController extends Controller
{
    // Konstruktor z middleware dla autoryzacji
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Wyświetlenie listy towarów
    public function index()
    {
        $towary = Towar::with('kategoria')->get();
        return view('towar.index', compact('towary'));
    }

    // Formularz tworzenia nowego towaru
    public function create()
    {
        // Sprawdź, czy aktualnie zalogowany użytkownik jest administratorem
        if (Auth::user()->isAdmin()) {
            $kategorie = Kategoria::all();
            return view('towar.create', compact('kategorie'));
        } else {
            // Jeśli użytkownik nie jest administratorem, przekieruj go z komunikatem o braku uprawnień
            return redirect()->route('towar.index')->with('error', 'Brak uprawnień do tej akcji.');
        }
    }

    // Zapisanie nowego towaru do bazy danych
    public function store(Request $request)
    {
        // Sprawdź, czy aktualnie zalogowany użytkownik jest administratorem
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'nazwa' => 'required|string|max:255',
                'opis' => 'nullable|string',
                'cena' => 'required|numeric',
                'kategoria_id' => 'required|exists:kategorie,id',
            ]);

            Towar::create($request->all());

            return redirect()->route('towar.index')->with('success', 'Towar został dodany pomyślnie.');
        } else {
            // Jeśli użytkownik nie jest administratorem, przekieruj go z komunikatem o braku uprawnień
            return redirect()->route('towar.index')->with('error', 'Brak uprawnień do tej akcji.');
        }
    }

    // Formularz edycji istniejącego towaru
    public function edit($id)
    {
        // Sprawdź, czy aktualnie zalogowany użytkownik jest administratorem
        if (Auth::user()->isAdmin()) {
            $towar = Towar::findOrFail($id);
            $kategorie = Kategoria::all();
            return view('towar.edit', compact('towar', 'kategorie'));
        } else {
            // Jeśli użytkownik nie jest administratorem, przekieruj go z komunikatem o braku uprawnień
            return redirect()->route('towar.index')->with('error', 'Brak uprawnień do tej akcji.');
        }
    }

    // Aktualizacja istniejącego towaru
    public function update(Request $request, $id)
    {
        // Sprawdź, czy aktualnie zalogowany użytkownik jest administratorem
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'nazwa' => 'required|string|max:255',
                'opis' => 'nullable|string',
                'cena' => 'required|numeric',
                'kategoria_id' => 'required|exists:kategorie,id',
            ]);

            $towar = Towar::findOrFail($id);
            $towar->update($request->all());

            return redirect()->route('towar.index')->with('success', 'Towar został zaktualizowany pomyślnie.');
        } else {
            // Jeśli użytkownik nie jest administratorem, przekieruj go z komunikatem o braku uprawnień
            return redirect()->route('towar.index')->with('error', 'Brak uprawnień do tej akcji.');
        }
    }

    // Wyświetlenie szczegółów towaru
    public function show($id)
    {
        $towar = Towar::with('kategoria')->findOrFail($id);
        return view('towar.show', compact('towar'));
    }

    // Usunięcie towaru z bazy danych
    public function destroy($id)
    {
        // Sprawdź, czy aktualnie zalogowany użytkownik jest administratorem
        if (Auth::user()->isAdmin()) {
            $towar = Towar::findOrFail($id);
            $towar->delete();

            return redirect()->route('towar.index')->with('success', 'Towar został usunięty pomyślnie.');
        } else {
            // Jeśli użytkownik nie jest administratorem, przekieruj go z komunikatem o braku uprawnień
            return redirect()->route('towar.index')->with('error', 'Brak uprawnień do tej akcji.');
        }
    }
}
