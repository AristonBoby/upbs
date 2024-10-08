<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/jenisLayanan', [App\Http\Controllers\jenisLayanan::class, 'index'])->name('layanan');
Route::get('/pendaftaran', [App\Http\Controllers\pendaftaraan::class, 'index'])->name('pendaftaran');
Route::get('/pengajuanBenih', [App\Http\Controllers\pengajuanBenih::class, 'index'])->name('pengajuanBenih');
Route::get('/statusLayanan', [App\Http\Controllers\statusLayanan::class, 'index'])->name('statusLayanan');
Route::get('/profil', [App\Http\Controllers\profil::class, 'index'])->name('profil');
Route::get('/varitas', [App\Http\Controllers\varitas::class, 'index'])->name('varitas');
Route::get('/varitasHapus', [App\Http\Controllers\varitasHapus::class, 'index'])->name('varitasHapus');
Route::get('/katVaritas', [App\Http\Controllers\kategoriVaritas::class, 'index'])->name('katVaritas');
Route::get('/katvaritasHapus', [App\Http\Controllers\kategorivaritasHapus::class, 'index'])->name('katvaritasHapus');
Route::get('/passwordUpdate', [App\Http\Controllers\passwordUpdate::class, 'index'])->name('passwordUpdate');
Route::get('print/{url}', [App\Http\Controllers\print_permohonan::class, 'print'])->name('print');


//Route::get('/hapusVaritas', [App\Http\Controllers\varitas::class, 'restore'])->name('hapusVaritas');

