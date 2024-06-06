<?php

namespace App\Http\Controllers;

use App\Models\Towar;
use Illuminate\Http\Request;

class KlientController extends Controller
{
    public function show($id)
    {
        $towar = Towar::findOrFail($id);
        return view('klient.show', compact('towar'));
    }
}
