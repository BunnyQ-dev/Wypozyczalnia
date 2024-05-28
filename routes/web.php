<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TowarController;
use App\Http\Controllers\WypozyczeniaController;

Route::get('/', function () {
    return view('welcome');
});
//towary
Route::get('/towary', [TowarController::class, 'index'])->name('towary.index');
Route::get('/towary/create', [TowarController::class, 'create'])->name('towary.crate');
Route::post('/towary', [TowarController::class, 'store'])->name('towary.store');
Route::delete('/towary/{id}', [TowarController::class, 'destroy'])->name('towary.destroy');

//wypozyczenia
Route::get('/wypozyczenia', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index');
Route::get('/wypozyczenia/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create');
Route::post('/wypozyczenia', [WypozyczeniaController::class, 'store'])->name('wypozyczenia.store');
Route::get('/wypozyczenia/{id}/edit', [WypozyczeniaController::class, 'edit'])->name('wypozyczenia.edit');
Route::put('/wypozyczenia/{id}', [WypozyczeniaController::class, 'update'])->name('wypozyczenia.update');
Route::delete('/wypozyczenia/{id}', [WypozyczeniaController::class, 'delete'])->name('wypozyczenia.delete');
