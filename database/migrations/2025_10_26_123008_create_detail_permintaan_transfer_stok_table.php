<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_permintaan_transfer_stok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_permintaan')->constrained('permintaan_transfer_stok')->onDelete('cascade');
            $table->foreignId('id_bahan_baku')->constrained('bahan_baku')->onDelete('restrict');
            $table->decimal('jumlah_diminta', 10, 2);
            // Tidak ada timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_permintaan_transfer_stok');
    }
};