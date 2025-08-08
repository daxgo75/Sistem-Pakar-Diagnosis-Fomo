<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('diagnosis_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->float('final_cf', 8, 2);
            $table->float('percentage', 8, 2);
            $table->json('selected_gejala');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diagnosis_histories');
    }
};