<?php

// app/Http/Controllers/KategoriaController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoria;

class KategoriaController extends Controller
{
    /**
     * Wyświetla szczegóły określonej kategorii.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoria = Kategoria::with('towary')->findOrFail($id);
        return view('kategorie.show', compact('kategoria'));
    }
}
