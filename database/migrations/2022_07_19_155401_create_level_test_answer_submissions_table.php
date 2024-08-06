<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelTestAnswerSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_test_answer_submissions', function (Blueprint $table) {
            $table->id();
            $table->integer('level_test_id');
            $table->string('email');
            $table->string('question');
            $table->string('answer');
            $table->tinyInteger('point_value');
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
        Schema::dropIfExists('level_test_answer_submissions');
    }
}
