<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reservasi')->insert([
            [
                'id_pelanggan' => 1, // Rina Setiawati
                'id_meja' => 3, // Meja 03
                'waktu_reservasi' => now()->addDay(),
                'jumlah_orang' => 4,
                'status' => 'dikonfirmasi',
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}