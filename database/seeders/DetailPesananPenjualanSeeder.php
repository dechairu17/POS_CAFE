<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPesananPenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detail_pesanan_penjualan')->insert([
            [
                'id_pesanan_penjualan' => 1, // Dari Penjualan di atas
                'id_produk' => 1, // Kopi Susu
                'jumlah' => 1,
                'harga_saat_jual' => 18000
            ],
            [
                'id_pesanan_penjualan' => 1,
                'id_produk' => 2, // Roti Bakar
                'jumlah' => 1,
                'harga_saat_jual' => 15000
            ]
            // Total = 18000 + 15000 = 33000 (cocok)
        ]);
    }
}