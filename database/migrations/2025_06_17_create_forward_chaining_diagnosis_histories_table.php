<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('forward_chaining_diagnosis_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('penyakit_id')->constrained('penyakits')->onDelete('cascade');
            $table->timestamps();
        });

        // Pivot table for diagnosis and gejala
        Schema::create('diagnosis_gejala', function (Blueprint $table) {
            $table->foreignId('diagnosis_id')->constrained('forward_chaining_diagnosis_histories')->onDelete('cascade');
            $table->foreignId('gejala_id')->constrained('gejalas')->onDelete('cascade');
            $table->primary(['diagnosis_id', 'gejala_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('diagnosis_gejala');
        Schema::dropIfExists('forward_chaining_diagnosis_histories');
    }
};