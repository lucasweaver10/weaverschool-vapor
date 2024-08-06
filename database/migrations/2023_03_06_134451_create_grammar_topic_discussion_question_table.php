<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrammarTopicDiscussionQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grammar_topic_discussion_question', function (Blueprint $table) {
            $table->unsignedBigInteger('grammar_topic_id');
            $table->unsignedBigInteger('discussion_question_id');                
            $table->foreign('grammar_topic_id')->references('id')->on('grammar_topics')->onDelete('cascade');
            $table->foreign('discussion_question_id')->references('id')->on('discussion_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grammar_topic_discussion_question');
    }
}
