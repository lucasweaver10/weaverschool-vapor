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
        // rename the 'audio_url' column to 'audio_urls' and 'example_audio_url' to 'example_audio_urls' on the 'vocabulary_words' table    
        Schema::table('vocabulary_words', function (Blueprint $table) {
            $table->renameColumn('audio_url', 'audio_urls');
            $table->renameColumn('example_audio_url', 'example_audio_urls');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // reverse the migration
        Schema::table('vocabulary_words', function (Blueprint $table) {
            $table->renameColumn('audio_urls', 'audio_url');
            $table->renameColumn('example_audio_urls', 'example_audio_url');
        });
    }
};
