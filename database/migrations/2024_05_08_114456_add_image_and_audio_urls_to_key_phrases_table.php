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
        Schema::table('key_phrases', function (Blueprint $table) {
            // add image_url, and example_audio_urls as text columns
            $table->text('image_url')->nullable()->after('audio_urls');
            $table->text('example_audio_urls')->nullable()->after('audio_urls');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('key_phrases', function (Blueprint $table) {
            //
        });
    }
};
