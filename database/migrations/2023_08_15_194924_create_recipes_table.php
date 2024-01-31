<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('recipe_name')->uniqid();
            $table->text('ing')->nullable();
            $table->string('recipe_description')->nullable();
            $table->string('cookingtime')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->text('category')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('link')->nullable();
            $table->string('allergy')->nullable();
            $table->string('nutrition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
