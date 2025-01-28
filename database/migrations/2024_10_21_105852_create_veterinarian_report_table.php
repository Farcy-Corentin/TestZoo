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
        Schema::create('veterinarian_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id');
            $table->string('animal_state');
            $table->foreignId('food_consum_id');
            $table->string('content');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinarian_reports');
    }
};
