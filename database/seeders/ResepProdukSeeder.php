<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResepProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('resep_produk')->insert([
            // Resep Kopi Susu (Produk ID 1)
            ['id_produk' => 1, 'id_bahan_baku' => 1, 'jumlah_dipakai' => 20], // 20gr Kopi
            ['id_produk' => 1, 'id_bahan_baku' => 2, 'jumlah_dipakai' => 100], // 100ml Susu
            ['id_produk' => 1, 'id_bahan_baku' => 3, 'jumlah_dipakai' => 15], // 15ml Gula Aren
            
            // Resep Roti Bakar (Produk ID 2)
            ['id_produk' => 2, 'id_bahan_baku' => 4, 'jumlah_dipakai' => 2], // 2 pcs Roti
        ]);
    }
}