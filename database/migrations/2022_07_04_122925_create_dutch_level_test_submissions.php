<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutchLevelTestSubmissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dutch_level_test_submissions', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('dutch_level_test_submissions');
    }
}
