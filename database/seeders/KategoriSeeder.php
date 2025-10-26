<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['nama' => 'Kopi', 'deskripsi' => 'Minuman berbasis kopi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Non-Kopi', 'deskripsi' => 'Minuman selain kopi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Makanan', 'deskripsi' => 'Makanan ringan dan berat', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}