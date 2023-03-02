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
        Schema::create('propertiables', function (Blueprint $table) {
          $table->unsignedBigInteger('property_value_id');
          $table->string('propertiable_type');
          $table->string('propertiable_id');
          $table->foreign('property_value_id')
              ->references('id')->on('property_values')
              ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propertiables');
    }
};
