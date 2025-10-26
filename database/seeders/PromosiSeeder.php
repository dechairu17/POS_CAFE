<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromosiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('promosi')->insert([
            [
                'nama' => 'Diskon Awal Pekan',
                'tipe' => 'persentase',
                'nilai' => 10, // 10%
                'kode' => 'SENINHEMAT',
                'tgl_mulai' => '2025-01-01',
                'tgl_selesai' => '2025-12-31',
                'aktif' => true,
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}