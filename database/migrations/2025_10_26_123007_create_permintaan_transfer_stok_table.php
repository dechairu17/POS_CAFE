<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permintaan_transfer_stok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dari_id_gudang')->constrained('gudang')->onDelete('restrict');
            $table->foreignId('ke_id_gudang')->constrained('gudang')->onDelete('restrict');
            $table->foreignId('id_pengguna_peminta')->constrained('pengguna')->onDelete('restrict');
            $table->string('status', 50)->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permintaan_transfer_stok');
    }
};