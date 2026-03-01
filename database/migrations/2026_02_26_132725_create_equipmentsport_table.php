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
        Schema::create('equipment_sports', function (Blueprint $table) {
            $table->foreignId('equipment_id')
                  ->constrained('equipment');
            $table->foreignId('sport_id')
                  ->constrained('sports');
            $table->primary(['equipment_id', 'sport_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_sports');
    }
};
