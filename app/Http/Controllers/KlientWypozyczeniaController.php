<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wypozyczenia;
use Illuminate\Support\Facades\Auth;
use App\Models\Towar;
use Illuminate\Support\Facades\Validator;

class KlientWypozyczeniaController extends Controller
{
    public function showAll()
    {
        $user = Auth::user();
        $towar = Towar::all();
        $wypozyczenia = Wypozyczenia::where('user_id', $user->id)->get();
        return view('klient.wypozyczenia.show', compact('user','wypozyczenia', 'towar'));
    }

    public function destroy($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);
        $wypozyczenie->delete();
        return redirect()->route('klient.wypozyczenia.show')->with('success', 'Rezerwacja została usunięta.');
    }

    public function edit($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);

        if(Auth::id() !== $wypozyczenie->user_id) {
            return redirect()->route('klient.wypozyczenia.show')->with('error', 'You are not authorized to edit this order.');
        }

        return view('klient.wypozyczenia.edit', compact('wypozyczenie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'towar_id' => 'required|exists:towar,id',
            'data_wypozyczenia' => 'required|date|after_or_equal:today',
            'data_zwrotu' => 'required|date|after:data_wypozyczenia',
        ]);

        $wypozyczenie = Wypozyczenia::findOrFail($id);

        // Перевірка на наявність пересічення дат
        $exists = Wypozyczenia::where('towar_id', $request->towar_id)
            ->where('id', '!=', $id) // Виключити поточне замовлення
            ->where(function ($query) use ($request) {
                $query->whereBetween('data_wypozyczenia', [$request->data_wypozyczenia, $request->data_zwrotu])
                    ->orWhereBetween('data_zwrotu', [$request->data_wypozyczenia, $request->data_zwrotu])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('data_wypozyczenia', '<=', $request->data_wypozyczenia)
                            ->where('data_zwrotu', '>=', $request->data_zwrotu);
                    });
            })
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Nie możesz wybrać taki zakres dat.')->withInput();
        }

        $wypozyczenie->update([
            'towar_id' => $request->towar_id,
            'data_wypozyczenia' => $request->data_wypozyczenia,
            'data_zwrotu' => $request->data_zwrotu,
        ]);

        return redirect()->route('klient.wypozyczenia.show')->with('success', 'Zamówienie zostało pomyślnie zaktualizowane.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'towar_id' => 'required|exists:towar,id',
            'data_wypozyczenia' => 'required|date|after_or_equal:today',
            'data_zwrotu' => 'required|date|after:data_wypozyczenia',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Musisz być zalogowany, aby wynająć towar.');
        }

        // Перевірка на наявність пересічення дат
        $exists = Wypozyczenia::where('towar_id', $request->towar_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('data_wypozyczenia', [$request->data_wypozyczenia, $request->data_zwrotu])
                    ->orWhereBetween('data_zwrotu', [$request->data_wypozyczenia, $request->data_zwrotu])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('data_wypozyczenia', '<=', $request->data_wypozyczenia)
                            ->where('data_zwrotu', '>=', $request->data_zwrotu);
                    });
            })
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Nie możesz wybrać taki zakres dat.')->withInput();
        }

        Wypozyczenia::create([
            'user_id' => $user->id,
            'towar_id' => $request->towar_id,
            'data_wypozyczenia' => $request->data_wypozyczenia,
            'data_zwrotu' => $request->data_zwrotu,
        ]);

        return redirect()->route('klient.towary.index')->with('success', 'Towar został wynajęty pomyślnie.');
    }
}
