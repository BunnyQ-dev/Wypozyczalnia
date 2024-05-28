<?php

namespace App\Http\Controllers;

use App\Models\Maszyna;
use Illuminate\Http\Request;

class MaszynyController extends Controller
{
    public function index()
    {
        $maszyny = Maszyna::all();
        return view('maszyny.index', compact('maszyny'));
    }
}
