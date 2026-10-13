<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaSertifikasiController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

  // Khusus Admin
Route::middleware('role:admin')->group(function () {
    Route::resource('peserta', PesertaController::class)
        ->parameters(['peserta' => 'peserta']);

    Route::resource('skema', SkemaSertifikasiController::class)
        ->parameters(['skema' => 'skema']);
});

    // Khusus User: melihat peserta dan detail
    Route::get('/daftar-peserta', [PesertaController::class, 'userIndex'])
        ->name('user.peserta');

    Route::get('/daftar-peserta/{peserta}', [PesertaController::class, 'userShow'])
        ->name('user.peserta.show');

    // Khusus User: melihat skema dan detail
    Route::get('/daftar-skema', [SkemaSertifikasiController::class, 'userIndex'])
        ->name('user.skema');

    Route::get('/daftar-skema/{skema}', [SkemaSertifikasiController::class, 'userShow'])
        ->name('user.skema.show');
});