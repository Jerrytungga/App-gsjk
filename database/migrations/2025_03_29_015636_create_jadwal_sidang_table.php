<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_sidang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sidang'); // Nama sidang
            $table->string('hari'); // hari sidang
            $table->time('waktu_mulai'); // Waktu sidang
            $table->time('waktu_akhir'); // Waktu sidang
            $table->string('tempat'); // Lokasi sidang
            $table->text('deskripsi')->nullable(); // Keterangan tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_sidang');
    }
};
