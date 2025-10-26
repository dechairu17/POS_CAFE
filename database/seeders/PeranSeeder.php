<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeranSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('peran')->insert([
            ['nama' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Manajer', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kasir', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}