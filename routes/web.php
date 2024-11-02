<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/stok', function () {
    return view('stok');
});
Route::get('/pemasukan', function () {
    return view('keuangan/pemasukkan');
});
Route::get('/pengeluaran', function () {
    return view('keuangan/pengeluaran');
});
Route::get('/pesanan', function () {
    return view('/pesanan');
});