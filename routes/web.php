<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TowarController;
use App\Http\Controllers\WypozyczeniaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriaController;
use App\Http\Controllers\KlientWypozyczeniaController;
use App\Http\Controllers\KlientTowaryController;
use App\Http\Middleware\EnsureUserIsOwner;
use App\Http\Controllers\AdminHomeController;

// Trasy autoryzacji
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
});


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

// Trasy для TowarController
Route::prefix('towary')->middleware('admin')->group(function () {
    Route::get('/', [TowarController::class, 'index'])->name('admin.towar.index');
    Route::get('/create', [TowarController::class, 'create'])->name('admin.towar.create');
    Route::post('/', [TowarController::class, 'store'])->name('admin.towar.store');
    Route::get('/{id}', [TowarController::class, 'show'])->name('admin.towar.show');
    Route::get('/{id}/edit', [TowarController::class, 'edit'])->name('admin.towar.edit');
    Route::put('/{id}', [TowarController::class, 'update'])->name('admin.towar.update');
    Route::delete('/{id}', [TowarController::class, 'destroy'])->name('admin.towar.destroy');
});


// Trasy для WypozyczeniaController
Route::prefix('wypozyczenia')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [WypozyczeniaController::class, 'index'])->name('admin.wypozyczenia.index');
    Route::get('/create', [WypozyczeniaController::class, 'create'])->name('admin.wypozyczenia.create');
    Route::post('/', [WypozyczeniaController::class, 'store'])->name('admin.wypozyczenia.store');
    Route::get('/{id}/edit', [WypozyczeniaController::class, 'edit'])->name('admin.wypozyczenia.edit');
    Route::put('/{id}', [WypozyczeniaController::class, 'update'])->name('admin.wypozyczenia.update');
    Route::delete('/{id}', [WypozyczeniaController::class, 'delete'])->name('admin.wypozyczenia.delete');
});


// Trasy для UserController
Route::prefix('uzytkownicy')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.uzytkownicy.index');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.uzytkownicy.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('admin.uzytkownicy.update');
    Route::get('/{user}', [UserController::class, 'show'])->name('admin.uzytkownicy.show');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.uzytkownicy.destroy');
});


// Trasy для KategoriaController
Route::prefix('kategorie')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [KategoriaController::class, 'index'])->name('admin.kategorie.index');
    Route::get('/create', [KategoriaController::class, 'create'])->name('admin.kategorie.create');
    Route::post('/', [KategoriaController::class, 'store'])->name('admin.kategorie.store');
    Route::get('/{id}', [KategoriaController::class, 'show'])->name('admin.kategorie.show');
    Route::get('/{id}/edit', [KategoriaController::class, 'edit'])->name('admin.kategorie.edit');
    Route::put('/{id}', [KategoriaController::class, 'update'])->name('admin.kategorie.update');
    Route::delete('/{id}', [KategoriaController::class, 'destroy'])->name('admin.kategorie.destroy');
});


// Trasy для KlientController
Route::prefix('klient')->middleware('auth')->group(function () {
    Route::get('/towar/{id}', [KlientTowaryController::class, 'show'])->name('klient.towar.show');
    Route::post('/rent', [KlientWypozyczeniaController::class, 'store'])->name('klient.rent.store');
    Route::get('/uzytkownicy/{user}', [UserController::class, 'showForClient'])->name('klient.uzytkownicy.show');
    Route::get('/uzytkownicy/{user}/edit', [UserController::class, 'editForClient'])->name('klient.uzytkownicy.edit');
    Route::put('/uzytkownicy/{user}', [UserController::class, 'updateForClient'])->name('klient.uzytkownicy.update');
    Route::get('/towary', [KlientTowaryController::class, 'index'])->name('klient.towary.index');
    Route::get('/towar/{id}', [KlientTowaryController::class, 'show'])->name('klient.towar.show');

    Route::get('/wypozyczenia', [KlientWypozyczeniaController::class, 'showAll'])->name('klient.wypozyczenia.show');
    Route::delete('/wypozyczenia/{id}', [KlientWypozyczeniaController::class, 'destroy'])->name('klient.wypozyczenia.destroy');
    Route::get('/wypozyczenia/{id}/edit', [KlientWypozyczeniaController::class, 'edit'])->name('klient.wypozyczenia.edit');
    Route::put('/wypozyczenia/{id}', [KlientWypozyczeniaController::class, 'update'])->name('klient.wypozyczenia.update');
    Route::post('/wypozyczenia', [KlientWypozyczeniaController::class, 'store'])->name('klient.wypozyczenia.store');;

});



Route::get('/blocked-dates/{towar_id}', [WypozyczeniaController::class, 'getBlockedDates']);


Route::get('/noaccess', function () {
    return view('noaccess');
});
