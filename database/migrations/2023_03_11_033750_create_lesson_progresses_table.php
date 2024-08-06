<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_progresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->constrained();
            $table->unsignedInteger('lesson_id')->constrained();
            $table->boolean('guided_practice_completed')->default(false);
            $table->boolean('free_practice_completed')->default(false);
            $table->boolean('quiz_completed')->default(false);
            $table->integer('completion_count')->default(0);
            $table->dateTime('started_at')->default(null);
            $table->dateTime('completed_at')->default(null);
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
        Schema::dropIfExists('lesson_progresses');
    }
}
