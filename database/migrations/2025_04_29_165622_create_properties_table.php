<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('location');
            $table->string('city');
            $table->string('neighborhood')->nullable();
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('area', 10, 2);
            $table->string('type');
            $table->string('status');
            $table->boolean('furnished')->default(false);
            $table->integer('year_built')->nullable();
            $table->json('amenities')->nullable();
            $table->string('image')->nullable();
            $table->string('broker_name')->nullable();
            $table->string('broker_phone')->nullable();
            $table->string('broker_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
