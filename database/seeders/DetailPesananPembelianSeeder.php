<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPesananPembelianSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detail_pesanan_pembelian')->insert([
            [
                'id_pesanan_pembelian' => 1, // Dari PO di atas
                'id_bahan_baku' => 1, // Biji Kopi
                'jumlah' => 10000, // 10.000 gr
                'biaya_per_unit' => 150
            ],
            [
                'id_pesanan_pembelian' => 1,
                'id_bahan_baku' => 2, // Susu UHT
                'jumlah' => 100000, // 100.000 ml
                'biaya_per_unit' => 15
            ]
            // Total = (10000*150) + (100000*15) = 1.5jt + 1.5jt = 3jt (cocok)
        ]);
    }
}