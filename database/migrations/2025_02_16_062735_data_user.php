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
        //
        Schema::create('dataUser', function (Blueprint $table) {
            $table->id();
            $table->string('ktp');
            $table->string('nama');
            $table->string('telepon');
            $table->string('pelayanan');
            $table->string('lokal');
            $table->string('akses');
            $table->text('username');
            $table->text('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('dataUser');
    }
};
