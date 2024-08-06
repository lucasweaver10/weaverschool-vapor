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
            // add native_locale and target_locale columns
            $table->string('native_locale')->nullable();
            $table->string('target_locale')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flashcard_sets', function (Blueprint $table) {
            // reverse the migrations
            $table->dropColumn('native_locale');
            $table->dropColumn('target_locale');
        });
    }
};
