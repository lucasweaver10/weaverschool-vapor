<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('subject');
            $table->dropColumn('experience');
            $table->dropColumn('price');
            $table->dropColumn('teacher_id');
            $table->dropColumn('focus');
            $table->dropColumn('day');
            $table->dropColumn('weekly_lessons');
            $table->dropColumn('total_lessons');
            $table->dropColumn('lesson_hours');
            $table->dropColumn('total_weeks');
            $table->dropColumn('max_size');
            $table->dropColumn('time');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
}
