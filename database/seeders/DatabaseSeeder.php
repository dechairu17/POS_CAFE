<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // --- Level 0 (Master Data Inti) ---
            PeranSeeder::class,
            GudangSeeder::class,
            KategoriSeeder::class,
            MejaSeeder::class,
            BahanBakuSeeder::class,
            PemasokSeeder::class,
            PelangganSeeder::class,
            PromosiSeeder::class,

            // --- Level 1 (Data yang bergantung pada Level 0) ---
            PenggunaSeeder::class,          // Butuh Peran, Gudang
            ProdukSeeder::class,            // Butuh Kategori
            StokBahanBakuSeeder::class,     // Butuh Gudang, BahanBaku

            // --- Level 2 (Data yang bergantung pada Level 1) ---
            ResepProdukSeeder::class,       // Butuh Produk, BahanBaku
            ReservasiSeeder::class,         // Butuh Pelanggan, Meja
            ShiftSeeder::class,             // Butuh Pengguna
            PesananPembelianSeeder::class,  // Butuh Pemasok, Gudang, Pengguna

            // --- Level 3 (Detail Transaksi) ---
            DetailPesananPembelianSeeder::class, // Butuh PesananPembelian
            
            // --- Level 4 (Transaksi Penjualan & Transfer) ---
            // Pisahkan agar data lebih rapi
            PesananPenjualanSeeder::class,
            PermintaanTransferStokSeeder::class,

            // --- Level 5 (Detail Penjualan & Transfer) ---
            DetailPesananPenjualanSeeder::class,
            DetailPermintaanTransferStokSeeder::class,

            // --- Level 6 (Pivot Transaksi) ---
            PromosiPesananSeeder::class,
        ]);
    }
}