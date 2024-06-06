<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towar;
use App\Models\Kategoria;

class KlientTowaryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoria_id = $request->input('kategoria_id');

        $query = Towar::query();

        if ($search) {
            $query->where('nazwa', 'LIKE', "%{$search}%")
                ->orWhere('opis', 'LIKE', "%{$search}%");
        }

        if ($kategoria_id) {
            $query->where('kategoria_id', $kategoria_id);
        }

        $towary = $query->get();
        $kategorie = Kategoria::all();

        return view('klient.towary.index', compact('towary', 'kategorie'));
    }

    public function show($id)
    {
        $towar = Towar::findOrFail($id);
        return view('klient.towary.show', compact('towar'));
    }
}
