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
        Schema::table('flashcard_sets', function (Blueprint $table) {
            // add learning_path_id to flashcard_sets table
            $table->unsignedBigInteger('learning_path_id')->after('flashcard_set_group_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flashcard_sets', function (Blueprint $table) {
            // reverse the migration
            $table->dropColumn('learning_path_id');
        });
    }
};
