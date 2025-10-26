<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan, karena shift biasanya bukan data dummy
        // Tapi Anda bisa menambahkannya jika perlu untuk testing
        /*
        DB::table('shift')->insert([
            [
                'id_pengguna' => 3, // Kasir Budi
                'waktu_mulai' => now()->subHours(8),
                'waktu_selesai' => now(),
                'uang_awal' => 500000,
                'uang_akhir' => 1500000,
                'total_penjualan_sistem' => 1000000,
                'created_at' => now()->subHours(8), 'updated_at' => now()
            ]
        ]);
        */
    }
}