<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create()
    {
        $machines = Machine::all();
        return view('reservations.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'machine' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Sprawdź dostępność maszyny w wybranym terminie i zapisz rezerwację do bazy danych
        // Tutaj umieść logikę sprawdzania dostępności i zapisywania rezerwacji

        return redirect()->route('home')->with('success', 'Rezerwacja została dokonana pomyślnie.');
    }
}
