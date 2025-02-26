<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TransaksiController::class, 'index'])->name('home');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
