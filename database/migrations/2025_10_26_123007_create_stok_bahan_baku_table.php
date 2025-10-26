<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stok_bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gudang')->constrained('gudang')->onDelete('cascade');
            $table->foreignId('id_bahan_baku')->constrained('bahan_baku')->onDelete('cascade');
            $table->decimal('jumlah_stok', 10, 2)->default(0);

            // Stok satu bahan per gudang harus unik
            $table->unique(['id_gudang', 'id_bahan_baku']);
            // Tidak ada timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stok_bahan_baku');
    }
};