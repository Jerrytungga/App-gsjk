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
        Schema::create('data_peserta_rb', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('gender');
            $table->string('sekolah');
            $table->string('kelas');
            $table->string('agama');
            $table->string('lokal');
            $table->date('tgl_terdaftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('data_peserta_rb');
    }
};
