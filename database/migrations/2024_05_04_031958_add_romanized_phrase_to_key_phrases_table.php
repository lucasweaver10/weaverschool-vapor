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
            // add romanized_phrase to key_phrases table
            $table->text('romanized_phrase')->after('phrase')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('key_phrases', function (Blueprint $table) {
            // reverse the migration
            $table->dropColumn('romanized_phrase');
        });
    }
};
