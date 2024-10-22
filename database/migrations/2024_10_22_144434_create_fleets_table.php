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
            $table->string('title');                // Menambahkan kolom title
            $table->string('slug')->unique();
            $table->text('description');            // Menambahkan kolom description
            $table->string('image');
            $table->year('start_model_year');       // Menambahkan kolom start model year
            $table->year('end_model_year'); // Menambahkan kolom end model year (nullable jika tidak ada end year)
            $table->integer('fleet_size');          // Menambahkan kolom fleet size
            $table->integer('engine_count');        // Menambahkan kolom engine count
            $table->integer('passenger');           // Menambahkan kolom jumlah penumpang
            $table->string('model_class');          // Menambahkan kolom model class
            $table->integer('range');               // Menambahkan kolom range
            $table->integer('max_cruising_speed');  // Menambahkan kolom max cruising speed
            $table->integer('ceiling');             // Menambahkan kolom ceiling
            $table->integer('take_off_distance');   // Menambahkan kolom take off distance
            $table->integer('landing_distance');    // Menambahkan kolom landing distance
            $table->enum('status', ['active', 'inactive']);
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
