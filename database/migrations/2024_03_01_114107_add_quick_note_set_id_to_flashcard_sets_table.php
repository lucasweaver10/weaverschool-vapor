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
            $table->unsignedBigInteger('quick_note_set_id')->after('flashcard_set_group_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flashcard_sets', function (Blueprint $table) {
            // reverse the migration //
            $table->dropColumn('quick_note_id');            
        });
    }
};
