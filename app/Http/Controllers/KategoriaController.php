<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoria;

class KategoriaController extends Controller
{
    public function index()
    {
        $kategorie = Kategoria::all();
        return view('admin.kategorie.index', compact('kategorie'));
    }

    public function create()
    {
        return view('admin.kategorie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255'
        ]);

        Kategoria::create([
            'nazwa' => $request->nazwa
        ]);

        return redirect()->route('admin.kategorie.index')->with('success', 'Kategoria dodana pomyślnie');
    }

    public function show($id)
    {
        $kategoria = Kategoria::with('towary')->findOrFail($id);
        return view('admin.kategorie.show', compact('kategoria'));
    }

    public function edit($id)
    {
        $kategoria = Kategoria::findOrFail($id);
        return view('admin.kategorie.edit', compact('kategoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nazwa' => 'required|string|max:255'
        ]);

        $kategoria = Kategoria::findOrFail($id);
        $kategoria->nazwa = $request->nazwa;
        $kategoria->save();

        return redirect()->route('admin.kategorie.index')->with('success', 'Kategoria zaktualizowana pomyślnie');
    }

    public function destroy($id)
    {
        $kategoria = Kategoria::findOrFail($id);
        $kategoria->delete();

        return redirect()->route('admin.kategorie.index')->with('success', 'Kategoria usunięta pomyślnie');
    }
}
