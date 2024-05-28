<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towar;

class TowarController extends Controller
{
    public function index()
    {
        $towary = Towar::with('kategoria')->get();
        return view('towary.index', compact('towary'));
    }

    public function create()
    {
        $kategorie = Kategoria::all();
        return view('towary.create', compact('kategorie'));
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

        return redirect()->route('towary.index')->with('success', 'Towar został dodany pomyślnie.');
    }

}
