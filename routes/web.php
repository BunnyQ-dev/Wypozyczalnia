<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TowarController;
use App\Http\Controllers\WypozyczeniaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/towary', [TowarController::class, 'index'])->name('towary.index');
Route::get('/towary/create', [TowarController::class, 'create'])->name('towary.crate');
Route::post('/towary', [TowarController::class, 'store'])->name('towary.store');

Route::get('/wypozyczenia', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index');
Route::get('/wypozyczenia/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create');
Route::post('/wypozyczenia', [WypozyczeniaController::class, 'store'])->name('wypozyczenia.store');
