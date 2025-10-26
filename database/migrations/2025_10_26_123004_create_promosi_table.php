<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promosi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tipe', 50);
            $table->decimal('nilai', 15, 2);
            $table->string('kode', 50)->nullable()->unique();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promosi');
    }
};