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
        Schema::create('user_learning_paths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('learning_path_id');            
            $table->dateTime('started_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('last_accessed')->nullable();

            // Foreign keys constraints
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade'); // Adjust onDelete behavior as needed
            $table->foreign('learning_path_id')->references('id')->on('learning_paths')
            ->onDelete('cascade'); // Adjust onDelete behavior as needed

            // To ensure a user can't be associated with the same learning path with same locales more than once
            $table->unique(['user_id', 'learning_path_id', 'target_locale', 'native_locale'], 'ulpaths_unique');

            // Timestamps (optional, depending on your needs)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_learning_paths');
    }
};
