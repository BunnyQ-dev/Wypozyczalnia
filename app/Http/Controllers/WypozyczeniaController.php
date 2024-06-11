<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wypozyczenia;
use App\Models\Towar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WypozyczeniaController extends Controller
{
    public function create()
    {
        $towary = Towar::all();
        $users = User::all();
        return view('admin.wypozyczenia.create', compact('towary', 'users'));
    }

    public function store(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'towar_id' => 'required|exists:towar,id', // should be 'towary' instead of 'towar'
            'data_wypozyczenia' => 'required|date|after_or_equal:today',
            'data_zwrotu' => 'required|date|after:data_wypozyczenia',
        ]);

        // If validation fails, return to the previous page with errors and input
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check for overlapping rental periods
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

        // If there's an overlap, return to the previous page with an error message
        if ($exists) {
            return redirect()->back()->with('error', 'Nie możesz wybrać taki zakres dat.')->withInput();
        }

        // Create a new rental record
        Wypozyczenia::create([
            'user_id' => $user->id, // Use the authenticated user's ID
            'towar_id' => $request->towar_id,
            'data_wypozyczenia' => $request->data_wypozyczenia,
            'data_zwrotu' => $request->data_zwrotu,
        ]);

        // Redirect to the rentals page with a success message
        return redirect()->route('admin.wypozyczenia.index')->with('success', 'Towar został wynajęty pomyślnie.');
    }



    public function delete($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);
        $wypozyczenie->delete();

        return redirect()->route('admin.wypozyczenia.index')->with('success', 'Wypożyczenie zostało usunięte.');
    }

    public function edit($id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);
        $towary = Towar::all();
        $users = User::all();

        return view('admin.wypozyczenia.edit', compact('wypozyczenie', 'towary', 'users'));
    }

    public function index()
    {
        $wypozyczenia = Wypozyczenia::with(['user', 'towar'])->get();
        return view('admin.wypozyczenia.index', compact('wypozyczenia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'towar_id' => 'required|exists:towar,id',
            'data_wypozyczenia' => 'required|date',
            'data_zwrotu' => 'nullable|date|after:data_wypozyczenia',
        ]);

        $wypozyczenie = Wypozyczenia::findOrFail($id);
        $wypozyczenie->update($request->all());

        return redirect()->route('admin.wypozyczenia.index')->with('success', 'Wypożyczenie zostało zaktualizowane.');
    }

    public function getBlockedDates($towar_id)
    {
        $wypozyczenia = Wypozyczenia::where('towar_id', $towar_id)->get(['data_wypozyczenia', 'data_zwrotu']);
        return response()->json($wypozyczenia);
    }

    public function changeStatus(Request $request, $id)
    {
        $wypozyczenie = Wypozyczenia::findOrFail($id);

        if ($wypozyczenie->status !== 'zarezerwowane') {
            return redirect()->route('admin.wypozyczenia.index')->with('error', 'Nie można rozpocząć wypożyczenia, ponieważ nie jest w stanie oczekiwania.');
        }

        $wypozyczenie->update(['status' => 'w_trakcie']);

        return redirect()->route('admin.wypozyczenia.index')->with('success', 'Wypożyczenie zostało rozpoczęte.');
    }




}
