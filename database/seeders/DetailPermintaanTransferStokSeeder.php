<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPermintaanTransferStokSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detail_permintaan_transfer_stok')->insert([
            [
                'id_permintaan' => 1, // Dari transfer di atas
                'id_bahan_baku' => 1, // Biji Kopi
                'jumlah_diminta' => 500
            ]
        ]);
    }
}