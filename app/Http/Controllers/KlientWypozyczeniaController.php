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
        $towar = Towar::findOrFail($wypozyczenie->towar_id);

        if(Auth::id() !== $wypozyczenie->user_id) {
            return redirect()->route('klient.wypozyczenia.show')->with('error', 'Nie masz uprawnień do edycji tego zamówienia.');
        }

        return view('klient.wypozyczenia.edit', compact('wypozyczenie', 'towar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data_wypozyczenia' => 'required|date|after_or_equal:today',
            'data_zwrotu' => 'required|date|after:data_wypozyczenia',
        ]);

        $wypozyczenie = Wypozyczenia::findOrFail($id);

        if(Auth::id() !== $wypozyczenie->user_id) {
            return redirect()->route('klient.wypozyczenia.show')->with('error', 'Nie masz uprawnień do edycji tego zamówienia.');
        }

        $existingReservations = Wypozyczenia::where('id', '!=', $id)
            ->where('towar_id', $wypozyczenie->towar_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('data_wypozyczenia', [$request->data_wypozyczenia, $request->data_zwrotu])
                    ->orWhereBetween('data_zwrotu', [$request->data_wypozyczenia, $request->data_zwrotu])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('data_wypozyczenia', '<=', $request->data_wypozyczenia)
                            ->where('data_zwrotu', '>=', $request->data_zwrotu);
                    });
            })
            ->exists();

        if ($existingReservations) {
            return redirect()->back()->with('error', 'Nie można wybrać tego zakresu dat, ponieważ przecina się z inną rezerwacją.')->withInput();
        }

        // Оновлюємо дані резервування
        $wypozyczenie->update([
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

        return redirect()->route('klient.wypozyczenia.show')->with('success', 'Towar został wynajęty pomyślnie.');
    }

    public function returnRental(Request $request, $id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);

        if ($wypozyczenie->status === 'zwrocone') {
            return redirect()->route('klient.wypozyczenia.showInProgress')->with('error', 'To wypożyczenie zostało już zwrócone.');
        }

        $wypozyczenie->update(['status' => 'zwrocone']);

        $wypozyczenie->update(['data_zwrotu' => now()->toDateString()]);

        return redirect()->route('klient.wypozyczenia.in_progress')->with('success', 'Wypożyczenie zostało zakończone.');
    }

    public function showInProgress()
    {
        $user = Auth::user();
        $wypozyczenia = Wypozyczenia::where('user_id', $user->id)
            ->where('status', 'w_trakcie')
            ->get();

        return view('klient.wypozyczenia.in_progress', compact('user', 'wypozyczenia'));
    }



}
