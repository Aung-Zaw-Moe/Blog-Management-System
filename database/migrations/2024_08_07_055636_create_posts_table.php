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
            $table->string('title');
            $table->string('slug')->nullable(); // Moved slug here and removed change()
            $table->longText('description');
            $table->string('image')->nullable(); // Made image nullable
            $table->string('name')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Should be unsignedBigInteger
            $table->string('post_status')->nullable();
            $table->string('userType')->nullable();
            $table->unsignedBigInteger('likes')->default(0); // Add likes column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
