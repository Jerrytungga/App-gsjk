<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('file_administrasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');
            $table->string('kategori_file');
            $table->string('file_path'); // Menyimpan path file yang diunggah
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_administrasis');
    }
};
