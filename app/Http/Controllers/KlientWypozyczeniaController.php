<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wypozyczenia;
use Illuminate\Support\Facades\Auth;
use App\Models\Towar;

class KlientWypozyczeniaController extends Controller
{
    public function showAll()
    {
        // Отримати і відобразити всі резервації користувача
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
        return view('klient.wypozyczenia.edit', compact('wypozyczenie'));
    }


    public function store(Request $request)
    {
        // Перевірка вхідних даних в запиті
        $request->validate([
            'towar_id' => 'required|exists:towar,id',
            'data_wypozyczenia' => 'required|date',
            'data_zwrotu' => 'required|date|after:data_wypozyczenia',
        ]);

        // Отримання поточного користувача
        $user = Auth::user();

        // Перевірка, чи користувач аутентифікований
        if (!$user) {
            // Перенаправлення на сторінку входу з повідомленням про необхідність аутентифікації
            return redirect()->route('login')->with('error', 'Musisz być zalogowany, aby wynająć towar.');
        }

        // Створення нового запису в базі даних для виписаного товару
        $wypozyczenie = Wypozyczenia::create([
            'user_id' => $user->id,
            'towar_id' => $request->towar_id,
            'data_wypozyczenia' => $request->data_wypozyczenia,
            'data_zwrotu' => $request->data_zwrotu,
        ]);

        // Перенаправлення на сторінку зі списком товарів з повідомленням про успішне створення виписаного товару
        return redirect()->route('klient.towary.index')->with('success', 'Towar został wynajęty pomyślnie.');
    }
}
