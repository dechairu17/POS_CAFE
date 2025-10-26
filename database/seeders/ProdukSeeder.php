<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'id_kategori' => 1, // 1 = Kopi
                'nama' => 'Kopi Susu Gula Aren',
                'harga_jual' => 18000,
                'tersedia' => true,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id_kategori' => 3, // 3 = Makanan
                'nama' => 'Roti Bakar Coklat',
                'harga_jual' => 15000,
                'tersedia' => true,
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}