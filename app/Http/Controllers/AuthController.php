<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;


class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role === 'mahasiswa') {
                return redirect()->route('dashboard.mahasiswa');
            } elseif ($role === 'dosen') {
                return redirect()->route('dashboardDSN');
            } elseif ($role === 'admin') {
                return redirect()->route('dashboard');
            }
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $username = $request->input('username'); // bisa NIP/NIM
            $password = $request->input('password');

            // Coba cari berdasarkan nim di tabel mahasiswa
            $mahasiswa = MahasiswaModel::where('nim', $username)->first();
            if ($mahasiswa && Hash::check($password, $mahasiswa->user->password)) {
                Auth::login($mahasiswa->user);
                return response()->json([
                    'status' => true,
                    'message' => 'Login Mahasiswa Berhasil',
                    // Arahkan ke halaman user setelah login berhasil
                    'redirect' => route('dashboard.mahasiswa')
                ]);
            }

            // Coba cari berdasarkan nip di tabel dosen
            $dosen = DosenModel::where('nip', $username)->first();
            if ($dosen && Hash::check($password, $dosen->user->password)) {
                Auth::login($dosen->user);
                return response()->json([
                    'status' => true,
                    'message' => 'Login Dosen Berhasil',
                    // Arahkan ke halaman user setelah login berhasil
                    'redirect' => route('dashboardDSN')
                ]);
            }

            // Coba cari berdasarkan nip di tabel admin
            $admin = AdminModel::where('nip', $username)->first();
            if ($admin && Hash::check($password, $admin->user->password)) {
                Auth::login($admin->user);
                return response()->json([
                    'status' => true,
                    'message' => 'Login Admin Berhasil',
                    // Arahkan ke halaman user setelah login berhasil
                    'redirect' => route('dashboard')
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'NIP/NIM atau Password salah'
            ]);
        }

        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }