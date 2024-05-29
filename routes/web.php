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

// Trasy dla TowarController
Route::get('/towar', [TowarController::class, 'index'])->name('towar.index')->middleware('auth');
Route::get('/towar/create', [TowarController::class, 'create'])->name('towar.create')->middleware('auth');
Route::post('/towar', [TowarController::class, 'store'])->name('towar.store')->middleware('auth');
Route::delete('/towar/{id}', [TowarController::class, 'destroy'])->name('towar.destroy')->middleware('auth');
Route::get('/towar/{id}/edit', [TowarController::class, 'edit'])->name('towar.edit')->middleware('auth');
Route::put('/towar/{id}', [TowarController::class, 'update'])->name('towar.update')->middleware('auth');

// Trasy dla WypozyczeniaController
Route::get('/wypozyczenia', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index')->middleware('auth');
Route::get('/wypozyczenia/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create')->middleware('auth');
Route::post('/wypozyczenia', [WypozyczeniaController::class, 'store'])->name('wypozyczenia.store')->middleware('auth');
Route::get('/wypozyczenia/{id}/edit', [WypozyczeniaController::class, 'edit'])->name('wypozyczenia.edit')->middleware('auth');
Route::put('/wypozyczenia/{id}', [WypozyczeniaController::class, 'update'])->name('wypozyczenia.update')->middleware('auth');
Route::delete('/wypozyczenia/{id}', [WypozyczeniaController::class, 'delete'])->name('wypozyczenia.delete')->middleware('auth');

// Trasy dla UserController
Route::get('/uzytkownicy', [UserController::class, 'index'])->name('uzytkownicy.index')->middleware('auth');

// Trasa główna dla HomeController
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::get('/kategorie/{id}', 'KategoriaController@show')->name('kategoria.show');

