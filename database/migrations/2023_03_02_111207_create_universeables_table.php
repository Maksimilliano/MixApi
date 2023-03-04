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
        Schema::create('universeables', function (Blueprint $table) {
            $table->unsignedBigInteger('universe_id');
            $table->string('universeable_type');
            $table->string('uneverseable_id');
            $table->foreign('universe_id')->references('id')->on('universes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universeables');
    }
};
