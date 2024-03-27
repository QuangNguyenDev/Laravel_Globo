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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->foreignId('authorId')->constrained('users')->onDelete('cascade');
            $table->bigInteger('parentId')->nullable();
            $table->string('title', 75);
            $table->string('metaTitle', 100);
            $table->string('slug', 100);
            $table->tinyText('summary')->nullable();
            $table->tinyInteger('published');
            $table->dateTime('createdAt');
            $table->dateTime('updatedAt')->nullable();
            $table->text('content');
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
