<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resep_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produk')->constrained('produk')->onDelete('cascade');
            $table->foreignId('id_bahan_baku')->constrained('bahan_baku')->onDelete('restrict');
            $table->decimal('jumlah_dipakai', 10, 2);
            // Tidak ada timestamps untuk tabel pivot sederhana
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resep_produk');
    }
};