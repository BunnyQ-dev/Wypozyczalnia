<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wypozyczenia;
use App\Models\Towar;
use Illuminate\Support\Facades\Auth;

class KlientWypozyczeniaController extends Controller
{
    public function show($id)
    {
        $towar = Towar::findOrFail($id);
        return view('klient.show', compact('towar'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'towar_id' => 'required|exists:towary,id',
                'data_wypozyczenia' => 'required|date',
                'data_zwrotu' => 'required|date|after:data_wypozyczenia',
            ]);

            $user = Auth::user();
            $towar = Towar::findOrFail($request->towar_id);

            $wypozyczenie = Wypozyczenia::create([
                'user_id' => $user->id,
                'towar_id' => $towar->id,
                'data_wypozyczenia' => $request->data_wypozyczenia,
                'data_zwrotu' => $request->data_zwrotu,
            ]);

            return redirect()->route('klient.towar.show', $towar->id)->with('success', 'Wypożyczenie dla użytkownika ' . $user->username . ' zostało dodane pomyślnie.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Wystąpił błąd: ' . $e->getMessage());
        }
    }
}
