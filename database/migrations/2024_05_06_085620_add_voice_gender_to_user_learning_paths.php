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
            // Add voice_gender column after target_locale column as nullable with default 'FEMALE'
            $table->string('voice_gender')->after('target_locale')->nullable()->default('FEMALE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_learning_paths', function (Blueprint $table) {
            // reverse the migration 
            $table->dropColumn('voice_gender');
        });
    }
};
