<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelTestSubmissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_test_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('level_test_id');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedInteger('score');
            $table->string('level');
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
        Schema::dropIfExists('level_test_submissions');
    }
}
