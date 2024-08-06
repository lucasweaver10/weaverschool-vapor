<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveGrammarSpeakingFocusFromLessonsTable extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['grammar_focus', 'speaking_focus']);
        });
    }

    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->string('grammar_focus')->nullable();
            $table->string('speaking_focus')->nullable();
        });
    }
}
