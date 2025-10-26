<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananPembelianSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pesanan_pembelian')->insert([
            [
                'id_pemasok' => 1, // CV Pangan
                'id_gudang' => 1, // Dapur Pusat
                'id_pengguna' => 2, // Manajer Ani
                'tgl_pesanan' => now()->subDays(1),
                'total_biaya' => 3000000,
                'status' => 'selesai',
                'created_at' => now()->subDays(1), 'updated_at' => now()
            ]
        ]);
    }
}