<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('discussion_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('grammar_topic_id')->nullable();
            $table->unsignedBigInteger('speaking_topic_id')->nullable();
            $table->unsignedBigInteger('vocabulary_word_id')->nullable();
            $table->timestamps();

            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->foreign('grammar_topic_id')->references('id')->on('grammar_topics')->onDelete('cascade');
            $table->foreign('speaking_topic_id')->references('id')->on('speaking_topics')->onDelete('cascade');
            $table->foreign('vocabulary_word_id')->references('id')->on('vocabulary_words')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('discussion_questions');
    }
}
