<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gejalas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_g')->unique();  // Make sure it's kode_g, not kode_gejala
            $table->string('nama_gejala');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gejalas');
    }
};
