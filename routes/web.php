<?php

use App\Http\Controllers\KotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.read');

Route::get('siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('siswa/create', [SiswaController::class, 'store']);

Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/siswa/{id}/edit', [SiswaController::class, 'update'])->name('siswa.update');

Route::delete('/siswa/{id}/delete', [SiswaController::class, 'destroy'])->name('siswa.delete');



Route::get('/ortu', [OrtuController::class, 'index'])->name('ortu.index');

Route::get('/ortu/create', [OrtuController::class, 'create'])->name('ortu.create');
Route::post('/ortu', [OrtuController::class, 'store'])->name('ortu.store');

Route::get('/ortu/{ortu}/edit', [OrtuController::class, 'edit'])->name('ortu.edit');
Route::put('/ortu/{ortu}', [OrtuController::class, 'update'])->name('ortu.update');

Route::delete('/ortu/{ortu}', [OrtuController::class, 'destroy'])->name('ortu.destroy');


Route::get('/registrasi', function () {
    return view('login.registrasi');
});
Route::post('/registrasi', [LoginController::class, 'store'])->name('login.store');


Route::get('/login', function () {
    return view('login.login');
});
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');


Route::get('/kota', [KotaController::class, 'index'])->name('kota.index');

Route::get('/kota/create', [KotaController::class, 'create'])->name('kota.create');
Route::post('/kota', [KotaController::class, 'store'])->name('kota.store');

Route::get('/kota/{kota}/edit', [KotaController::class, 'edit'])->name('kota.edit');
Route::put('/kota/{kota}', [KotaController::class, 'update'])->name('kota.update');

Route::delete('/kota/{kota}', [KotaController::class, 'destroy'])->name('kota.destroy');