<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokBahanBakuSeeder extends Seeder
{
    public function run(): void
    {
        // Ini adalah data stok awal, mungkin dari hasil PO pertama
        DB::table('stok_bahan_baku')->insert([
            // Stok di Dapur Pusat (Gudang 1)
            ['id_gudang' => 1, 'id_bahan_baku' => 1, 'jumlah_stok' => 10000],
            ['id_gudang' => 1, 'id_bahan_baku' => 2, 'jumlah_stok' => 100000],
            ['id_gudang' => 1, 'id_bahan_baku' => 3, 'jumlah_stok' => 50000],
            ['id_gudang' => 1, 'id_bahan_baku' => 4, 'jumlah_stok' => 1000],

            // Stok di Outlet Surabaya (Gudang 2)
            ['id_gudang' => 2, 'id_bahan_baku' => 1, 'jumlah_stok' => 1000],
            ['id_gudang' => 2, 'id_bahan_baku' => 2, 'jumlah_stok' => 5000],
            ['id_gudang' => 2, 'id_bahan_baku' => 3, 'jumlah_stok' => 1000],
            ['id_gudang' => 2, 'id_bahan_baku' => 4, 'jumlah_stok' => 100],
        ]);
    }
}