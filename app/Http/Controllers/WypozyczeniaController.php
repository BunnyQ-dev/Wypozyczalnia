<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wypozyczenia;
use App\Models\Towar;
use App\Models\User;

class WypozyczeniaController extends Controller
{
    public function create()
    {
        $towary = Towar::all();
        $users = User::all();
        return view('wypozyczenia.create', compact('towary', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'towar_id' => 'required|exists:towar,id',
            'data_wypozyczenia' => 'required|date',
            'data_zwrotu' => 'nullable|date|after:data_wypozyczenia',
        ]);

        Wypozyczenia::create($request->all());

        return redirect()->route('wypozyczenia.index')->with('success', 'Sprzęt został wypożyczony pomyślnie.');
    }

    public function index()
    {
        $wypozyczenia = Wypozyczenia::with(['user', 'towar'])->get();
        return view('wypozyczenia.index', compact('wypozyczenia'));
    }
}
