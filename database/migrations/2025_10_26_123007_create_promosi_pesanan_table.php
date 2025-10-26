<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promosi_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pesanan_penjualan')->constrained('pesanan_penjualan')->onDelete('cascade');
            $table->foreignId('id_promosi')->constrained('promosi')->onDelete('restrict');
            $table->decimal('diskon_diterapkan', 15, 2);
            // Tidak ada timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promosi_pesanan');
    }
};