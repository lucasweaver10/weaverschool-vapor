<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlashcardSetGroupToFlashcardSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flashcard_sets', function (Blueprint $table) {
            $table->unsignedBigInteger('flashcard_set_group_id')->nullable()->after('lesson_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flashcard_sets', function (Blueprint $table) {
            $table->dropColumn('flashcard_set_group_id');
        });
    }
}
