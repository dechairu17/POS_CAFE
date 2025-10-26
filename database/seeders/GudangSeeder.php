<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GudangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gudang')->insert([
            [
                'nama' => 'Dapur Pusat',
                'dapur_pusat' => true,
                'alamat' => 'Jl. Industri Utama No. 1',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama' => 'Outlet Surabaya',
                'dapur_pusat' => false,
                'alamat' => 'Jl. Raya Darmo No. 50',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}