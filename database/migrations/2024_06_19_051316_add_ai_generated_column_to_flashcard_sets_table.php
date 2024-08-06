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
            // add a boolean column after user_id with the default as false            
            $table->boolean('ai_generated_media')->default(false)->after('user_id');
            $table->boolean('ai_generated')->default(false)->after('user_id');
            $table->index('user_id');
            $table->index('ai_generated');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flashcard_sets', function (Blueprint $table) {
            // reverse the migration
            $table->dropColumn('ai_generated_media');
            $table->dropColumn('ai_generated');
            $table->dropIndex(['user_id']);
            $table->dropIndex(['ai_generated']);
            $table->dropIndex(['created_at']);
        });
    }
};
