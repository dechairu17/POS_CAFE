<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromosiPesananSeeder extends Seeder
{
    public function run(): void
    {
        // Dikosongkan, karena mungkin penjualan pertama tidak pakai promo
        // Jika penjualan (ID 1) pakai promo (ID 1), Anda bisa isi:
        /*
        DB::table('promosi_pesanan')->insert([
            [
                'id_pesanan_penjualan' => 1,
                'id_promosi' => 1,
                'diskon_diterapkan' => 3300 // 10% dari 33000
            ]
        ]);
        */
    }
}