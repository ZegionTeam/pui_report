<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\MenuController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('/menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menu');
        Route::post('/', [MenuController::class, 'store'])->name('menu.store');
        Route::put('/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/{id}', [MenuController::class, 'destroy'])->name('menu.delete');
    });

    Route::get('/stok', function () {
        return view('stok');
    })->name('stock');
    Route::get('/pemasukan', function () {
        return view('keuangan/pemasukkan');
    })->name('pemasukan');
    Route::get('/pengeluaran', function () {
        return view('keuangan/pengeluaran');
    })->name('pengeluaran');
    Route::get('/pesanan', function () {
        return view('/pesanan');
    })->name('pesanan');
});
