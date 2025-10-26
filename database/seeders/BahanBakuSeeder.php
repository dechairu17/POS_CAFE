<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanBakuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bahan_baku')->insert([
            ['nama' => 'Biji Kopi Arabika', 'satuan' => 'gram', 'harga_beli_default' => 150, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Susu UHT', 'satuan' => 'ml', 'harga_beli_default' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gula Aren Cair', 'satuan' => 'ml', 'harga_beli_default' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Roti Tawar', 'satuan' => 'pcs', 'harga_beli_default' => 1500, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}