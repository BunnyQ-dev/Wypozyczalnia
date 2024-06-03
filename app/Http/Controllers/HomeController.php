<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towar;
use App\Models\Kategoria;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $towary = Towar::all();
        $kategorie = Kategoria::all();
        $user = Auth::user();

        return view('home', compact('towary', 'kategorie','user'));
    }
}
