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
            $table->string('definition', 400)->change();
            $table->string('example', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flashcards', function (Blueprint $table) {
            // Assuming 'definition' was originally 255 characters
            $table->string('definition', 191)->change();
            // Assuming 'example' was originally a different length or you want to standardize it to 255
            $table->string('example', 191)->change();
        });
    }
};
