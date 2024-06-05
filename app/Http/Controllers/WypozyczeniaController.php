<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wypozyczenia;
use App\Models\Towar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WypozyczeniaController extends Controller
{
    public function create()
    {
        $towary = Towar::all();
        return view('wypozyczenia.create', compact('towary'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'towar_id' => 'required|exists:towary,id',
                'data_wypozyczenia' => 'required|date',
                'data_zwrotu' => 'required|date|after:data_wypozyczenia',
            ]);

            $user = Auth::user(); // Assuming the user is logged in
            $towar = Towar::findOrFail($request->towar_id);

            $wypozyczenie = Wypozyczenia::create([
                'user_id' => $user->id,
                'towar_id' => $towar->id,
                'data_wypozyczenia' => $request->data_wypozyczenia,
                'data_zwrotu' => $request->data_zwrotu,
            ]);

            return redirect()->route('wypozyczenia.index')->with('success', 'Wypożyczenie dla użytkownika ' . $user->name . ' zostało dodane pomyślnie.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Wystąpił błąd: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);
        $wypozyczenie->delete();

        return redirect()->route('wypozyczenia.index')->with('success', 'Wypożyczenie zostało usunięte.');
    }

    public function edit($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);
        $towary = Towar::all();
        $users = User::all();

        return view('wypozyczenia.edit', compact('wypozyczenie', 'towary', 'users'));
    }

    public function index()
    {
        $wypozyczenia = Wypozyczenia::with(['user', 'towar'])->get();
        return view('wypozyczenia.index', compact('wypozyczenia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'towar_id' => 'required|exists:towary,id',
            'data_wypozyczenia' => 'required|date',
            'data_zwrotu' => 'nullable|date|after:data_wypozyczenia',
        ]);

        $wypozyczenie = Wypozyczenia::findOrFail($id);
        $wypozyczenie->update($request->all());

        return redirect()->route('wypozyczenia.index')->with('success', 'Wypożyczenie zostało zaktualizowane.');
    }
}
