<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form login.
     * (View dari jawaban saya sebelumnya)
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani proses login.
     */
    public function login(Request $request)
    {
        // 1. Validasi input dari form
        $credentials = $request->validate([
            'username' => 'required|string',
            'kata_sandi' => 'required|string',
        ]);

        // 2. Siapkan data untuk Auth::attempt
        // Kunci untuk password HARUS 'password'
        // Laravel akan otomatis mencocokkannya dengan 'kata_sandi'
        // berkat metode getAuthPasswordName() di model.
        $authCredentials = [
            'username' => $credentials['username'],
            'password' => $credentials['kata_sandi']
        ];

        // 3. Coba lakukan login
        if (Auth::attempt($authCredentials)) {
            // 4. Jika berhasil, regenerasi session
            $request->session()->regenerate();

            // 5. Redirect ke halaman yang aman (misal: dashboard)
            // Anda bisa tambahkan logika redirect berdasarkan peran di sini
            return redirect()->intended('dashboard');
        }

        // 6. Jika gagal, kembali ke login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}