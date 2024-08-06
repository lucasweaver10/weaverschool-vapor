<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWordsToFlashcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flashcards', function (Blueprint $table) {
            // Add new columns for words, definitions, examples, and image urls //
            $table->string('term')->after('id');
            $table->string('definition')->after('term');
            $table->string('example')->after('definition')->nullable();
            $table->string('image_url')->after('example')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flashcards', function (Blueprint $table) {
            // Drop the columns if the migration is rolled back //
            $table->dropColumn('term');
            $table->dropColumn('definition');
            $table->dropColumn('example');
            $table->dropColumn('image_url');
        });
    }
}
