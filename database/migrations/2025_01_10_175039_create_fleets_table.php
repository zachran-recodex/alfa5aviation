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
        Schema::create('fleets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('image');
            $table->year('start_model_year')->nullable();
            $table->year('end_model_year')->nullable();
            $table->integer('fleet_size')->nullable();
            $table->integer('engine_count')->nullable();
            $table->integer('passenger')->nullable();
            $table->string('model_class')->nullable();
            $table->integer('range')->nullable();
            $table->integer('max_cruising_speed')->nullable();
            $table->integer('ceiling')->nullable();
            $table->integer('take_off_distance')->nullable();
            $table->integer('landing_distance')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleets');
    }
};
