<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrammarTopicWrittenExampleTable extends Migration
{
    public function up()
    {
        Schema::create('grammar_topic_written_example', function (Blueprint $table) {         
            $table->unsignedBigInteger('grammar_topic_id');
            $table->unsignedBigInteger('written_example_id');                
            $table->foreign('grammar_topic_id')->references('id')->on('grammar_topics')->onDelete('cascade');
            $table->foreign('written_example_id')->references('id')->on('written_examples')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grammar_topic_written_example');
    }
}
