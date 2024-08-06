<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocabularyWordSpeakingTopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocabulary_word_speaking_topic', function (Blueprint $table) {
            $table->unsignedBigInteger('speaking_topic_id');
            $table->unsignedBigInteger('vocabulary_word_id');                
            $table->foreign('speaking_topic_id')->references('id')->on('speaking_topics')->onDelete('cascade');
            $table->foreign('vocabulary_word_id')->references('id')->on('vocabulary_words')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vocabulary_word_speaking_topic');
    }
}
