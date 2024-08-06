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
        Schema::table('flashcards', function (Blueprint $table) {
            // add key_phrase_id after vocabulary_word_id
            $table->foreignId('key_phrase_id')->nullable()->after('vocabulary_word_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flashcards', function (Blueprint $table) {
            // reverse the migration
            $table->dropColumn('key_phrase_id');
        });
    }
};
