<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_test_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('level_test_id');
            $table->unsignedInteger('number');
            $table->string('type');
            $table->string('text');
            $table->string('description')->nullable();
            $table->unsignedInteger('possible_points');
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
        Schema::dropIfExists('level_test_questions');
    }
}
