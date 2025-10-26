<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggan')->insert([
            [
                'nama' => 'Rina Setiawati',
                'nomor_telepon' => '085611112222',
                'email' => 'rina@example.com',
                'tgl_bergabung' => '2024-01-15',
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}