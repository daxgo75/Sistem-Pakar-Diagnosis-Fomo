<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('diagnosis_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('cf_value', 8, 2);
            $table->json('gejala_terpilih');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diagnosis_results');
    }
};