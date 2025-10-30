<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
        
        $peran = Auth::user()->peran->nama; 

        // <-- INI BAGIAN YANG DIPERBAIKI -->
        if ($peran == 'Admin') {
            // Arahkan ke file di resources/views/admin/dashboard.blade.php
            return view('users.admin.dashboard'); 

        } elseif ($peran == 'Manajer') {
            // Arahkan ke file di resources/views/manajerGudang/dashboard.blade.php
            // Pastikan nama 'Manajer' sesuai dengan database Anda
            return view('users.manajerGudang.dashboard');

        } elseif ($peran == 'Kasir') {
             // Arahkan ke file di resources/views/kasir/dashboard.blade.php
            return view('users.kasir.dashboard');
        
        } else {
            // Pengaman jika peran tidak dikenali
            Auth::logout();
            return redirect()->route('login')->with('error', 'Peran Anda tidak valid.');
        }

    })->name('dashboard');

    // ...
    // Rute-rute lain yang terproteksi bisa diletakkan di sini
    // ...

});

// Arahkan halaman utama ke login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});
