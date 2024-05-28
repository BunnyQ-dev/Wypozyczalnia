<?php

use App\Models\Maszyna;

class MaszynyController extends Controller
{
    public function index()
    {
        $maszyny = Maszyna::all();
        return view('maszyny.index', compact('maszyny'));
    }
}
