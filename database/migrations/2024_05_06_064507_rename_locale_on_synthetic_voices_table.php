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
        // Add a new column called 'voice-locale' to the 'synthetic_voices' table after the 'locale' column
        Schema::table('synthetic_voices', function (Blueprint $table) {
            $table->string('voice_locale')->after('locale');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // reverse the migration by dropping the 'voice_locale' column
    }
};
