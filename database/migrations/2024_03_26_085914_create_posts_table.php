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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authorId');
            $table->unsignedBigInteger('parentId')->nullable();
            $table->string('title', 75);
            $table->string('metaTitle', 100);
            $table->string('slug', 100);
            $table->tinyText('summary')->nullable();
            $table->tinyInteger('published');
            $table->timestamps();
            $table->text('content');
        });     
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('authorId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parentId')->references('id')->on('posts')->onDelete('cascade');
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
