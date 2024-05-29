<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Pobierz wszystkich użytkowników

        return view('uzytkownicy.index', ['users' => $users]);
    }
}
