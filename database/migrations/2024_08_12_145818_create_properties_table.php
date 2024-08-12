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
        Schema::create('properties', function (Blueprint $table) {
           $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->decimal('price', 15, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('size'); // Size in square feet
            $table->unsignedBigInteger('owner_id');
            $table->string('image')->nullable(); // For property images
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
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
