<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pesanan_pembelian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pesanan_pembelian')->constrained('pesanan_pembelian')->onDelete('cascade');
            $table->foreignId('id_bahan_baku')->constrained('bahan_baku')->onDelete('restrict');
            $table->decimal('jumlah', 10, 2);
            $table->decimal('biaya_per_unit', 15, 2);
            // Tidak ada timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan_pembelian');
    }
};