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
        Schema::create('balai_sidang', function (Blueprint $table) {
            $table->id();
            $table->string('lokal');
            $table->string('alamat');
            $table->string('lokasi');
            $table->text('kontak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balai_sidang');
    }
};
