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
        Schema::create('blog_stories', function (Blueprint $table) {
            $table->id();
            $table->longText('body')->nullable();
            $table->text('summary')->nullable();
            $table->unsignedBigInteger('story_id')->nullable()->unique();
            $table->timestamps();

            $table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_stories');
    }
};
