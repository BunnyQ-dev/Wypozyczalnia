<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wypozyczenia;
use App\Models\Towar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'towar_id' => 'required|exists:towar,id',
            'data_wypozyczenia' => 'required|date|after_or_equal:today',
            'data_zwrotu' => 'required|date|after:data_wypozyczenia',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
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

    public function indexo()
    {
        $wypozyczenia = Wypozyczenia::with('towar.kategoria')
            ->where('status', 'zarezerwowane')
            ->get();

        return view('orders.index', compact('wypozyczenia'));
    }

    public function getBlockedDateso($towar_id)
    {
        $wypozyczenia = Wypozyczenia::where('towar_id', $towar_id)->get(['data_wypozyczenia', 'data_zwrotu']);

        $events = [];
        foreach ($wypozyczenia as $wypozyczenie) {
            $events[] = [
                'title' => 'zarezerwowane',
                'start' => $wypozyczenie->data_wypozyczenia,
                'end' => date('Y-m-d', strtotime($wypozyczenie->data_zwrotu . ' +1 day'))
            ];
        }

        return response()->json($events);
    }




    public function calendar(Towar $towar)
    {
        return view('orders.calendar', compact('towar'));
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

    public function inProgress()
    {
        $wypozyczenia = Wypozyczenia::with(['user', 'towar'])
            ->where('status', 'w_trakcie')
            ->get();
        return view('admin.wypozyczenia.in_progress', compact('wypozyczenia'));
    }

    public function returned()
    {
        $wypozyczenia = Wypozyczenia::with(['user', 'towar'])
            ->where('status', 'zwrocone')
            ->get();
        return view('admin.wypozyczenia.returned', compact('wypozyczenia'));
    }

    public function overdue()
    {
        $today = Carbon::today();
        $wypozyczenia = Wypozyczenia::with(['user', 'towar'])
            ->where('status', '!=', 'zwrocone')
            ->where('data_zwrotu', '<', $today)
            ->get();

        foreach ($wypozyczenia as $wypozyczenie) {
            $wypozyczenie->update(['status' => 'przekroczone']);
        }

        return view('admin.wypozyczenia.overdue', compact('wypozyczenia'));
    }

    public function reserved()
    {
        $wypozyczenia = Wypozyczenia::with(['user', 'towar'])
            ->where('status', 'zarezerwowane')
            ->get();
        return view('admin.wypozyczenia.reserved', compact('wypozyczenia'));
    }

}
