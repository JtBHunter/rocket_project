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
        Schema::create('cv_technology', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_cv_id')->constrained('user_cv');
            $table->foreignId('technology_id')->constrained('technology');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_technology');
    }
};
