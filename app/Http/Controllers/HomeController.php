<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towar;
use App\Models\Kategoria;

class HomeController extends Controller
{
    public function index()
    {
        $towary = Towar::all();
        $kategorie = Kategoria::all();

        return view('home', compact('towary', 'kategorie'));
    }
}
