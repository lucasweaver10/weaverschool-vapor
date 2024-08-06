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
            // add nullable audio_urls after the explanation column
            $table->text('audio_urls')->nullable()->after('explanation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('key_prhases', function (Blueprint $table) {
            // reverse the migration
            $table->dropColumn('audio_urls');
        });
    }
};
