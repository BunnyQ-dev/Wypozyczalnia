<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TowarController;

Route::get('/', function () {
    Route::get('/towary', [TowarController::class, 'index'])->name('towary.index');
    Route::get('/towary/create', [TowarController::class, 'create'])->name('towary.create');
    Route::post('/towary', [TowarController::class, 'store'])->name('towary.store');
});
