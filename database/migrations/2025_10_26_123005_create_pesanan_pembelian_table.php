<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan_pembelian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemasok')->constrained('pemasok')->onDelete('restrict');
            $table->foreignId('id_gudang')->constrained('gudang')->onDelete('restrict');
            $table->foreignId('id_pengguna')->constrained('pengguna')->onDelete('restrict');
            $table->date('tgl_pesanan');
            $table->decimal('total_biaya', 15, 2)->default(0);
            $table->string('status', 50)->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan_pembelian');
    }
};