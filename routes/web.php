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

// Trasy dla rejestracji, logowania i wylogowywania
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Trasa dla strony głównej po zalogowaniu
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Trasy dla TowarController dostępne dla wszystkich zalogowanych użytkowników
Route::middleware('auth')->group(function () {
    Route::get('/towary', [TowarController::class, 'index'])->name('towar.index');
    Route::get('/towary/{id}', [TowarController::class, 'show'])->name('towar.show');
});

// Trasy dla TowarController dostępne tylko dla administratorów
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/towary/create', [TowarController::class, 'create'])->name('towar.create');
    Route::post('/towary', [TowarController::class, 'store'])->name('towar.store');
    Route::get('/towary/{id}/edit', [TowarController::class, 'edit'])->name('towar.edit');
    Route::put('/towary/{id}', [TowarController::class, 'update'])->name('towar.update');
    Route::delete('/towary/{id}', [TowarController::class, 'destroy'])->name('towar.destroy');
});

// Trasy dla WypozyczeniaController dostępne tylko dla zalogowanych użytkowników
Route::middleware('auth')->group(function () {
    Route::get('/wypozyczenia', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index');
    Route::get('/wypozyczenia/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create');
    Route::post('/wypozyczenia', [WypozyczeniaController::class, 'store'])->name('wypozyczenia.store');
    Route::get('/wypozyczenia/{id}/edit', [WypozyczeniaController::class, 'edit'])->name('wypozyczenia.edit');
    Route::put('/wypozyczenia/{id}', [WypozyczeniaController::class, 'update'])->name('wypozyczenia.update');
    Route::delete('/wypozyczenia/{id}', [WypozyczeniaController::class, 'delete'])->name('wypozyczenia.delete');
});

// Trasy dla UserController dostępne tylko dla administratorów
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/uzytkownicy', [UserController::class, 'index'])->name('uzytkownicy.index');
    Route::get('/uzytkownicy/{id}/edit', [UserController::class, 'edit'])->name('uzytkownicy.edit');
    Route::post('/uzytkownicy/{id}', [UserController::class, 'update'])->name('uzytkownicy.update');
    Route::delete('/uzytkownicy/{id}', [UserController::class, 'destroy'])->name('uzytkownicy.destroy');
});

// Trasa główna dla HomeController dostępna dla zalogowanych użytkowników
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Trasy dla KategoriaController dostępne dla wszystkich zalogowanych użytkowników
Route::middleware('auth')->group(function () {
    Route::get('/kategorie', [KategoriaController::class, 'index'])->name('kategorie.index');
    Route::get('/kategorie/create', [KategoriaController::class, 'create'])->name('kategorie.create');
    Route::post('/kategorie', [KategoriaController::class, 'store'])->name('kategorie.store');
    Route::get('/kategorie/{id}', [KategoriaController::class, 'show'])->name('kategorie.show');
    Route::get('/kategorie/{id}/edit', [KategoriaController::class, 'edit'])->name('kategorie.edit');
    Route::put('/kategorie/{id}', [KategoriaController::class, 'update'])->name('kategorie.update');
    Route::delete('/kategorie/{id}', [KategoriaController::class, 'destroy'])->name('kategorie.destroy');
});
