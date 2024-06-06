<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Towar;

class HomeController extends Controller
{
    public function index()
    {
        // Получаем товары для отображения на главной странице
        $towary = Towar::take(4)->get();

        return view('index', compact('towary'));
    }
}
