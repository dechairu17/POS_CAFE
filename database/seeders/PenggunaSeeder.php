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
                'nama' => 'Admin Sistem',
                'email' => 'admin@example.com',
                'kata_sandi' => Hash::make('password123'), // Ganti dengan password aman
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id_peran' => 2, // 2 = Manajer
                'id_gudang' => 2, // 2 = Outlet Surabaya
                'nama' => 'Manajer Ani',
                'email' => 'ani@example.com',
                'kata_sandi' => Hash::make('password123'),
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id_peran' => 3, // 3 = Kasir
                'id_gudang' => 2, // 2 = Outlet Surabaya
                'nama' => 'Kasir Budi',
                'email' => 'budi@example.com',
                'kata_sandi' => Hash::make('password123'),
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}