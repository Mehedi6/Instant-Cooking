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
        Schema::create('api_searches', function (Blueprint $table) {
            $table->id();
            $table->string('RecipeName')->uniqid();
            $table->string('slug');
            $table->longText('RecipeIngredients');
            $table->longText('RecipeDescription');
            $table->string('CookingTime');
            $table->string('Image');
            $table->string('Video');
            $table->string('Ratings');
            $table->integer('category');
            $table->integer('user_id')->unsigned();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_searches');
    }
};
