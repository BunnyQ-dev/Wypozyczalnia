<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoria; // Importujesz model Kategoria

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
        $kategoria = Kategoria::findOrFail($id); // Pobierasz kategorię o określonym ID

        // Przekazujesz kategorię do widoku
        return view('kategorie.show', compact('kategoria'));
    }
}
