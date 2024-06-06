<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TowarController;
use App\Http\Controllers\WypozyczeniaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriaController;
use App\Http\Controllers\KlientWypozyczeniaController;
use App\Http\Controllers\KlientController;

// Trasy autoryzacji
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Trasy dla HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

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


// Trasy dla TowarController
Route::prefix('towary')->group(function () {
    Route::get('/', [TowarController::class, 'index'])->name('towar.index');
    Route::get('/create', [TowarController::class, 'create'])->name('towar.create');
    Route::post('/', [TowarController::class, 'store'])->name('towar.store');
    Route::get('/{id}', [TowarController::class, 'show'])->name('towar.show');
    Route::get('/{id}/edit', [TowarController::class, 'edit'])->name('towar.edit');
    Route::put('/{id}', [TowarController::class, 'update'])->name('towar.update');
    Route::delete('/{id}', [TowarController::class, 'destroy'])->name('towar.destroy');
});

// Trasy dla WypozyczeniaController
Route::prefix('wypozyczenia')->middleware('auth')->group(function () {
    Route::get('/', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index');
    Route::get('/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create');
    Route::post('/', [WypozyczeniaController::class, 'store'])->name('wypozyczenia.store');
    Route::get('/{id}/edit', [WypozyczeniaController::class, 'edit'])->name('wypozyczenia.edit');
    Route::put('/{id}', [WypozyczeniaController::class, 'update'])->name('wypozyczenia.update');
    Route::delete('/{id}', [WypozyczeniaController::class, 'delete'])->name('wypozyczenia.delete');
});

// Trasy dla UserController
Route::prefix('uzytkownicy')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('uzytkownicy.index');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('uzytkownicy.edit');
    Route::post('/{id}', [UserController::class, 'update'])->name('uzytkownicy.update');
    Route::get('/{id}', [UserController::class, 'show'])->name('uzytkownicy.show');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('uzytkownicy.destroy');
});

// Trasy dla KategoriaController
    Route::prefix('kategorie')->group(function () {
    Route::get('/', [KategoriaController::class, 'index'])->name('kategorie.index');
    Route::get('/create', [KategoriaController::class, 'create'])->name('kategorie.create');
    Route::post('/', [KategoriaController::class, 'store'])->name('kategorie.store');
    Route::get('/{id}', [KategoriaController::class, 'show'])->name('kategorie.show');
    Route::get('/{id}/edit', [KategoriaController::class, 'edit'])->name('kategorie.edit');
    Route::put('/{id}', [KategoriaController::class, 'update'])->name('kategorie.update');
    Route::delete('/{id}', [KategoriaController::class, 'destroy'])->name('kategorie.destroy');
});

Route::prefix('klient')->group(function () {
    Route::get('/towar/{id}', [KlientController::class, 'show'])->name('klient.towar.show');
    Route::post('/rent', [KlientWypozyczeniaController::class, 'store'])->name('klient.rent.store');
    Route::get('/uzytkownicy/{user}', [UserController::class, 'showForClient'])->name('klient.uzytkownicy.show');
    Route::get('/uzytkownicy/{user}/edit', [UserController::class, 'editForClient'])->name('klient.uzytkownicy.edit');
});
Route::put('/uzytkownicy/{id}', [UserController::class, 'updateForClient'])->name('uzytkownicy.update');

