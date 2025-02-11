<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\OrtuController;

// ROUTE KHUSUS GUEST (BELUM LOGIN)
Route::middleware(['guest'])->group(function () {
    Route::get('/registrasi', function () {
        return view('login.registrasi');
    });
    Route::post('/registrasi', [LoginController::class, 'store'])->name('login.store');

    Route::get('/login', function () {
        return view('login.login');
    })->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

// ROUTE LOGOUT (HANYA BISA DIAKSES JIKA SUDAH LOGIN)
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// ROUTE KHUSUS ADMIN
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::get('/kota', [KotaController::class, 'index'])->name('kota.index');
    Route::get('/kota/create', [KotaController::class, 'create'])->name('kota.create');
    Route::post('/kota', [KotaController::class, 'store'])->name('kota.store');
    Route::get('/kota/{kota}/edit', [KotaController::class, 'edit'])->name('kota.edit');
    Route::put('/kota/{kota}', [KotaController::class, 'update'])->name('kota.update');
    Route::delete('/kota/{kota}', [KotaController::class, 'destroy'])->name('kota.destroy');
});

// ROUTE UNTUK ADMIN & USER (TAPI USER TIDAK BISA MASUK ADMIN)
Route::middleware(['auth', 'level:admin,user'])->group(function () {
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
});
