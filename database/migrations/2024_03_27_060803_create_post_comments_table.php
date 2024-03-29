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
        Schema::create('post_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postId');
            $table->unsignedBigInteger('authorId')->nullable();
            $table->unsignedBigInteger('parentId')->nullable();
            $table->string('title', 100);
            $table->text('content');
            $table->tinyInteger('published');
            $table->dateTime('createdAt');
            $table->dateTime('updatedAt')->nullable();
        });
        Schema::table('post_comments', function (Blueprint $table) {
            $table->foreign('authorId')->references('id')->on('users')->onDelete('set null');
            $table->foreign('parentId')->references('id')->on('post_comments')->onDelete('cascade');
            $table->foreign('postId')->references('id')->on('posts')->onDelete('cascade');
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_comments');
    }
};
