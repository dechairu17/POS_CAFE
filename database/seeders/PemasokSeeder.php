<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasokSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pemasok')->insert([
            [
                'nama' => 'CV Pangan Sejahtera',
                'narahubung' => 'Bapak Agung',
                'telepon' => '08123456789',
                'alamat' => 'Jl. Grosir No. 10',
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}