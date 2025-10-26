<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MejaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('meja')->insert([
            ['nama' => 'Meja 01 (Indoor)', 'status' => 'tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Meja 02 (Indoor)', 'status' => 'tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Meja 03 (Outdoor)', 'status' => 'tersedia', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}