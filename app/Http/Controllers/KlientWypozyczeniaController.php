<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wypozyczenia;
use Illuminate\Support\Facades\Auth;

class KlientWypozyczeniaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'towar_id' => 'required|exists:towar,id',
            'data_wypozyczenia' => 'required|date',
            'data_zwrotu' => 'required|date|after:data_wypozyczenia',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Musisz być zalogowany, aby wynająć towar.');
        }

        $wypozyczenie = Wypozyczenia::create([
            'user_id' => $user->id,
            'towar_id' => $request->towar_id,
            'data_wypozyczenia' => $request->data_wypozyczenia,
            'data_zwrotu' => $request->data_zwrotu,
        ]);

        return redirect()->route('wypozyczenia.index')->with('success', 'Towar został wynajęty pomyślnie.');
    }
}

