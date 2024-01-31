<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->uniqid();//receipename
            $table->string('slug');
            $table->string('image');
            $table->longText('sub_title');//recipe ingredients
            $table->longText('discription');
            $table->string('video');
            $table->longText('cookingtime');
            $table->longText('calories')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};