<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // <-- 1. TAMBAHKAN BARIS INI
use App\Http\Controllers\AuthController;

// --- RUTE AUTENTIKASI ---
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// --- RUTE YANG MEMBUTUHKAN LOGIN ---
Route::middleware('auth')->group(function () {
    
    // Rute Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Rute Dashboard (terproteksi)
    Route::get('/dashboard', function () {
        // 2. GANTI 'auth()->user()' MENJADI 'Auth::user()'
        $peran = Auth::user()->peran->nama; 

        if ($peran == 'Admin') {
            return 'Selamat datang, Admin ' . Auth::user()->nama_lengkap;
        } elseif ($peran == 'Manajer') {
            return 'Selamat datang, Manajer ' . Auth::user()->nama_lengkap;
        } else {
            return 'Selamat datang, Kasir ' . Auth::user()->nama_lengkap;
        }
    })->name('dashboard');

    // ...

});

// Arahkan halaman utama ke login
Route::get('/', function () {
    // 3. GANTI 'auth()->check()' MENJADI 'Auth::check()'
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});