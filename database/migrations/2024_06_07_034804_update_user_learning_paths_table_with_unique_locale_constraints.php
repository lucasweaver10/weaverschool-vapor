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
        Schema::table('user_learning_paths', function (Blueprint $table) {
            // Add a new unique constraint with a shorter name
            $table->unique(['user_id', 'learning_path_id', 'target_locale', 'native_locale'], 'ulpaths_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_learning_paths', function (Blueprint $table) {
            // Drop the new unique constraint using the shorter name
            $table->dropUnique('ulpaths_unique');
        });
    }
};
