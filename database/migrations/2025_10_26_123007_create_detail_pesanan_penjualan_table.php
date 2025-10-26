<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pesanan_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pesanan_penjualan')->constrained('pesanan_penjualan')->onDelete('cascade');
            $table->foreignId('id_produk')->constrained('produk')->onDelete('restrict');
            $table->integer('jumlah');
            $table->decimal('harga_saat_jual', 15, 2);
            // Tidak ada timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan_penjualan');
    }
};