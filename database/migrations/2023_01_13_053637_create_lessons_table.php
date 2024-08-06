<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('lesson_number');
            $table->string('title');
            $table->text('description');
            $table->string('grammar_focus');
            $table->string('speaking_focus');
            $table->unsignedBigInteger('course_id');
            $table->boolean('is_available')->default(false);
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
