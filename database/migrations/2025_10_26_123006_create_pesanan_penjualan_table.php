<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('pengguna')->onDelete('restrict');
            $table->foreignId('id_pelanggan')->nullable()->constrained('pelanggan')->onDelete('set null');
            $table->foreignId('id_meja')->nullable()->constrained('meja')->onDelete('set null');
            $table->foreignId('id_gudang')->constrained('gudang')->onDelete('restrict');
            $table->string('nomor_faktur')->unique();
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total_diskon', 15, 2)->default(0);
            $table->decimal('total_akhir', 15, 2);
            $table->string('metode_bayar', 50)->nullable();
            $table->string('status', 50)->default('lunas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan_penjualan');
    }
};