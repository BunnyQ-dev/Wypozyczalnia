<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towar;
use App\Models\Kategoria;

class TowarController extends Controller
{
    public function index()
    {
        $towar = Towar::with('kategoria')->get();
        return view('towar.index', compact('towar'));
    }

    public function create()
    {
        $kategorie = Kategoria::all();
        return view('towar.create', compact('kategorie'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required',
            'opis' => 'nullable',
            'cena' => 'required|numeric',
            'kategoria_id' => 'required|exists:kategoria,id',
        ]);

        Towar::create($request->all());

        return redirect()->route('towar.index')->with('success', 'Towar został dodany pomyślnie.');
    }

    public function edit($id)
    {
        $towar = Towar::findOrFail($id);
        $kategorie = Kategoria::all();
        return view('towar.edit', compact('towar', 'kategorie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nazwa' => 'required',
            'opis' => 'nullable',
            'cena' => 'required|numeric',
            'kategoria_id' => 'required|exists:kategoria,id',
        ]);

        $towar = Towar::findOrFail($id);
        $towar->update($request->all());

        return redirect()->route('towar.index')->with('success', 'Towar został zaktualizowany pomyślnie.');
    }
}
