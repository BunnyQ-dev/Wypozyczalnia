<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TowarController;
use App\Http\Controllers\WypozyczeniaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriaController;


// Trasa główna przekierowująca na stronę logowania, jeśli użytkownik nie jest zalogowany
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/main', [TowarController::class, 'main'])->name('main');

Route::get('/onas', function () {
    return view('onas');
})->name('onas');

Route::get('/kontakt', function () {
    return view('kontakt');
})->name('kontakt');

Route::get('/oferta', function () {
    return view('oferta');
})->name('oferta');

Route::get('/zarezerwuj', function () {
    return view('zarezerwuj');
})->name('zarezerwuj');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/regulamin', function () {
    return view('regulamin');
})->name('regulamin');


// Trasy dla rejestracji, logowania i wylogowywania
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Trasa dla strony głównej po zalogowaniu
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Trasy dla TowarController
Route::get('/towary', [TowarController::class, 'index'])->name('towar.index');
Route::get('/towary/create', [TowarController::class, 'create'])->name('towar.create');
Route::post('/towary', [TowarController::class, 'store'])->name('towar.store');
Route::get('/towary/{id}', [TowarController::class, 'show'])->name('towar.show');
Route::get('/towary/{id}/edit', [TowarController::class, 'edit'])->name('towar.edit');
Route::put('/towary/{id}', [TowarController::class, 'update'])->name('towar.update');
Route::delete('/towary/{id}', [TowarController::class, 'destroy'])->name('towar.destroy');



// Trasy dla WypozyczeniaController
Route::get('/wypozyczenia', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index')->middleware('auth');
Route::get('/wypozyczenia/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create')->middleware('auth');
Route::post('/wypozyczenia', [WypozyczeniaController::class, 'store'])->name('wypozyczenia.store')->middleware('auth');
Route::get('/wypozyczenia/{id}/edit', [WypozyczeniaController::class, 'edit'])->name('wypozyczenia.edit')->middleware('auth');
Route::put('/wypozyczenia/{id}', [WypozyczeniaController::class, 'update'])->name('wypozyczenia.update')->middleware('auth');
Route::delete('/wypozyczenia/{id}', [WypozyczeniaController::class, 'delete'])->name('wypozyczenia.delete')->middleware('auth');

// Trasy dla UserController
Route::get('/uzytkownicy', [UserController::class, 'index'])->name('uzytkownicy.index');
Route::get('/uzytkownicy/{id}/edit', [UserController::class, 'edit'])->name('uzytkownicy.edit');
Route::post('/uzytkownicy/{id}', [UserController::class, 'update'])->name('uzytkownicy.update');
Route::get('/uzytkownicy/{id}', [UserController::class, 'show'])->name('uzytkownicy.show');
Route::delete('/uzytkownicy/{id}', [UserController::class, 'destroy'])->name('uzytkownicy.destroy');

// Trasa główna dla HomeController
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Trasy dla KategoriaController
Route::get('/kategorie', [KategoriaController::class, 'index'])->name('kategorie.index');
Route::get('/kategorie/create', [KategoriaController::class, 'create'])->name('kategorie.create');
Route::post('/kategorie', [KategoriaController::class, 'store'])->name('kategorie.store');
Route::get('/kategorie/{id}', [KategoriaController::class, 'show'])->name('kategorie.show');
Route::get('/kategorie/{id}/edit', [KategoriaController::class, 'edit'])->name('kategorie.edit');
Route::put('/kategorie/{id}', [KategoriaController::class, 'update'])->name('kategorie.update');
Route::delete('/kategorie/{id}', [KategoriaController::class, 'destroy'])->name('kategorie.destroy');

use App\Http\Controllers\KlientWypozyczeniaController;

Route::get('/klient/towar/{id}', [KlientWypozyczeniaController::class, 'show'])->name('klient.towar.show');
Route::post('/klient/rent', [KlientWypozyczeniaController::class, 'store'])->name('klient.rent.store');




