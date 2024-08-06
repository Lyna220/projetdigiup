<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\CaisseController;





Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('fournisseurs', FournisseurController::class);
Route::resource('produits', ProduitController::class);
Route::resource('clients', ClientController::class);
Route::resource('stocks', StockController::class);
Route::resource('ventes', VenteController::class);
Route::resource('factures', FactureController::class);
Route::resource('receptions', ReceptionController::class);
Route::resource('caisses', CaisseController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

});

require __DIR__.'/auth.php';
