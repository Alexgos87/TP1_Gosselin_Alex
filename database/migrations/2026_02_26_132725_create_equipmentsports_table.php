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
        Schema::create('equipmentsports', function (Blueprint $table) {
            $table->foreignId('equipmentId')
                  ->constrained('equipment');
            $table->foreignId('sportId')
                  ->constrained('sports');
            $table->primary(['equipmentId', 'sportId']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipmentsports');
    }
};
