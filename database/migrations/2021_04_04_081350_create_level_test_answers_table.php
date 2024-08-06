<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Question\Question;

class CreateLevelTestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_test_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('level_test_question_id');
            $table->string('text')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('point_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_test_answers');
    }
}
