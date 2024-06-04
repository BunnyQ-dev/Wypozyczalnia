<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towar;
use App\Models\Kategoria;

class TowarController extends Controller
{
    public function index()
    {
        $towary = Towar::with('kategoria')->get();
        return view('towar.index', compact('towary'));
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
            'zdjecie1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'zdjecie2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'zdjecie3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $towarData = $request->except(['zdjecie1', 'zdjecie2', 'zdjecie3']);

        // Handle file uploads
        if ($request->hasFile('zdjecie1')) {
            $path = $request->file('zdjecie1')->store('public/images');
            $towarData['zdjecie1'] = $path;
        }

        if ($request->hasFile('zdjecie2')) {
            $path = $request->file('zdjecie2')->store('public/images');
            $towarData['zdjecie2'] = $path;
        }

        if ($request->hasFile('zdjecie3')) {
            $path = $request->file('zdjecie3')->store('public/images');
            $towarData['zdjecie3'] = $path;
        }

        Towar::create($towarData);

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

    public function show($id)
    {
        $towar = Towar::with('kategoria')->findOrFail($id);
        return view('towar.show', compact('towar'));
    }

    public function destroy($id)
    {
        $towar = Towar::findOrFail($id);
        $towar->delete();

        return redirect()->route('towar.index')->with('success', 'Towar został usunięty pomyślnie.');
    }
}
