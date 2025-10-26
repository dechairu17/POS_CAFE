<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananPenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pesanan_penjualan')->insert([
            [
                'id_pengguna' => 3, // Kasir Budi
                'id_pelanggan' => 1, // Rina
                'id_meja' => 1, // Meja 01
                'id_gudang' => 2, // Outlet Surabaya
                'nomor_faktur' => 'INV-20251026-001',
                'subtotal' => 33000,
                'total_diskon' => 0,
                'total_akhir' => 33000,
                'metode_bayar' => 'QRIS',
                'status' => 'lunas',
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}