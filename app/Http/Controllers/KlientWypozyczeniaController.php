<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wypozyczenia;
use Illuminate\Support\Facades\Auth;
use App\Models\Towar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;


class KlientWypozyczeniaController extends Controller
{
    public function showAll()
    {
        $user = Auth::user();
        $towar = Towar::all();
        $wypozyczenia = Wypozyczenia::where('user_id', $user->id)
            ->where('status', 'zarezerwowane')
            ->get();

        return view('klient.wypozyczenia.show', compact('user', 'wypozyczenia', 'towar'));
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
            'data_zwrotu' => 'required|date|after_or_equal:data_wypozyczenia',
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
                $query->where(function ($query) use ($request) {
                    $query->where('data_wypozyczenia', '<=', $request->data_wypozyczenia)
                        ->where('data_zwrotu', '>=', $request->data_wypozyczenia);
                })->orWhere(function ($query) use ($request) {
                    $query->where('data_wypozyczenia', '<=', $request->data_zwrotu)
                        ->where('data_zwrotu', '>=', $request->data_zwrotu);
                })->orWhere(function ($query) use ($request) {
                    $query->where('data_wypozyczenia', '>=', $request->data_wypozyczenia)
                        ->where('data_zwrotu', '<=', $request->data_zwrotu);
                });
            })
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Nie możesz wybrać taki zakres dat, ponieważ przecina się z inną rezerwacją.')->withInput();
        }

        Wypozyczenia::create([
            'user_id' => $user->id,
            'towar_id' => $request->towar_id,
            'data_wypozyczenia' => $request->data_wypozyczenia,
            'data_zwrotu' => $request->data_zwrotu,
            'status' => 'zarezerwowane',
        ]);

        return redirect()->route('klient.wypozyczenia.show')->with('success', 'Towar został wynajęty pomyślnie.');
    }


    public function returnRental(Request $request, $id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);

        if ($wypozyczenie->status === 'zwrocone') {
            return redirect()->route('klient.wypozyczenia.showInProgress')->with('error', 'To wypożyczenie zostało już zwrócone.');
        }

        $towar = Towar::findOrFail($wypozyczenie->towar_id);
        $cena = $towar->cena;
        $data_wypozyczenia = Carbon::parse($wypozyczenie->data_wypozyczenia);
        $data_zwrotu = now();

        $days = ceil($data_wypozyczenia->diffInHours($data_zwrotu) / 24);

        $cena_do_zaplaty = $cena * $days;

        $wypozyczenie->update([
            'status' => 'zwrocone',
            'data_zwrotu' => $data_zwrotu->toDateString(),
            'cena_do_zaplaty' => $cena_do_zaplaty,
            'payment_status' => 'nie zaplacone',
        ]);

        return redirect()->route('klient.wypozyczenia.in_progress')->with('success', 'Wypożyczenie zostało zakońчено.');
    }




    public function showInProgress()
    {
        $user = Auth::user();
        $wypozyczeniaAktualne = Wypozyczenia::where('user_id', $user->id)
            ->where('status', 'w_trakcie')
            ->get();

        $wypozyczeniaPrzekroczone = Wypozyczenia::where('user_id', $user->id)
            ->where('status', 'przekroczone')
            ->get();

        return view('klient.wypozyczenia.in_progress', compact('user', 'wypozyczeniaAktualne', 'wypozyczeniaPrzekroczone'));
    }

    public function showCompleted()
    {
        $user = Auth::user();
        $wypozyczenia = Wypozyczenia::where('user_id', $user->id)
            ->where('status', 'zwrocone')
            ->get();

        return view('klient.wypozyczenia.completed', compact('user', 'wypozyczenia'));
    }

    public function showDetails($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);

        if ($wypozyczenie->user_id !== Auth::id()) {
            return redirect()->route('index')->with('error', 'Nie masz uprawnień do przeglądania tego zakończonego wypożyczenia.');
        }

        return view('klient.wypozyczenia.details', compact('wypozyczenie'));
    }

    public function pay($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);

        if ($wypozyczenie->payment_status === 'zaplacone') {
            return redirect()->route('klient.wypozyczenia.completed')->with('error', 'To wypożyczenie zostało już opłacone.');
        }

        $wypozyczenie->update([
            'payment_status' => 'zaplacone',
        ]);

        return redirect()->route('klient.wypozyczenia.completed')->with('success', 'Wypożyczenie zostało opłacone.');
    }
}
