<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Penting!

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengguna')->insert([
            [
                'id_peran' => 1, // 1 = Admin
                'id_gudang' => 1, // 1 = Dapur Pusat
                
                // --- INI YANG DIUBAH ---
                'nama_lengkap' => 'Admin Sistem', // Mengganti 'nama'
                'username' => 'admin',           // Mengganti 'email'
                // ---------------------

                'kata_sandi' => Hash::make('password123'),
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id_peran' => 2, // 2 = Manajer
                'id_gudang' => 2, // 2 = Outlet Surabaya
                'nama_lengkap' => 'Manajer Ani',
                'username' => 'ani_manajer',
                'kata_sandi' => Hash::make('password123'),
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id_peran' => 3, // 3 = Kasir
                'id_gudang' => 2, // 2 = Outlet Surabaya
                'nama_lengkap' => 'Kasir Budi',
                'username' => 'budi_kasir',
                'kata_sandi' => Hash::make('password123'),
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}