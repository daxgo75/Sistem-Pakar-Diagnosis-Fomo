<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('certainty_factors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gejala_id')->constrained('gejalas')->onDelete('cascade');
            $table->decimal('cf_pakar', 3, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certainty_factors');
    }
};