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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            // create columns for author_id, title, slug, content, featured_image, published_at, index_is_visible, featured, product_id, learning_path_id
            $table->unsignedBigInteger('author_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('featured_image')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->boolean('index_is_visible')->default(true);
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('learning_path_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
