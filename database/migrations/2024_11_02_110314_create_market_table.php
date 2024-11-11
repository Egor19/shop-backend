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
        Schema::create('market', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('processor');
            $table->integer('memory_capacity');
            $table->integer('disk_capacity');
            $table->string('video_card');
            $table->float('weight');
            $table->string('profile_image');
            $table->decimal('price', 8, 2);
            $table->integer('count');
            $table->timestamps(); // Добавит столбцы created_at и updated_at
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market');
    }
};
