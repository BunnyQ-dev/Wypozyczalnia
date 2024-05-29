<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TowarController;
use App\Http\Controllers\WypozyczeniaController;
use App\Http\Controllers\AuthController;

// Trasa główna przekierowująca na stronę logowania
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
Route::get('/home', function () {
    return redirect()->route('towary.index');
})->name('home')->middleware('auth');

// Trasy dla TowarController
Route::get('/towary', [TowarController::class, 'index'])->name('towary.index')->middleware('auth');
Route::get('/towary/create', [TowarController::class, 'create'])->name('towary.create')->middleware('auth');
Route::post('/towary', [TowarController::class, 'store'])->name('towary.store')->middleware('auth');
Route::delete('/towary/{id}', [TowarController::class, 'destroy'])->name('towary.destroy')->middleware('auth');
Route::get('/towary/{id}/edit', [TowarController::class, 'edit'])->name('towary.edit')->middleware('auth');
Route::put('/towary/{id}', [TowarController::class, 'update'])->name('towary.update')->middleware('auth');

// Trasy dla WypozyczeniaController
Route::get('/wypozyczenia', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index')->middleware('auth');
Route::get('/wypozyczenia/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create')->middleware('auth');
Route::post('/wypozyczenia', [WypozyczeniaController::class, 'store'])->name('wypozyczenia.store')->middleware('auth');
Route::get('/wypozyczenia/{id}/edit', [WypozyczeniaController::class, 'edit'])->name('wypozyczenia.edit')->middleware('auth');
Route::put('/wypozyczenia/{id}', [WypozyczeniaController::class, 'update'])->name('wypozyczenia.update')->middleware('auth');
Route::delete('/wypozyczenia/{id}', [WypozyczeniaController::class, 'delete'])->name('wypozyczenia.delete')->middleware('auth');
