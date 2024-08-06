<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_course_id');
            $table->unsignedBigInteger('bonus_course_id');
            $table->timestamps();

            $table->foreign('main_course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('bonus_course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus_courses');
    }
}
