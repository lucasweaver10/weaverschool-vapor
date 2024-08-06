<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrammarTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('grammar_topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('lesson_id');
            $table->timestamps();

            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grammar_topics');
    }
}
