<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peran')->constrained('peran')->onDelete('restrict');
            $table->foreignId('id_gudang')->nullable()->constrained('gudang')->onDelete('set null');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('kata_sandi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};