<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGradesColumnsInLessonProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lesson_progresses', function (Blueprint $table) {
            $table->dropColumn('guided_practice_completed');
            $table->dropColumn('free_practice_completed');
            $table->dropColumn('quiz_completed');
            
            $table->decimal('guided_practice_grade', 5, 2)->nullable();
            $table->decimal('free_practice_grade', 5, 2)->nullable();
            $table->decimal('quiz_grade', 5, 2)->nullable();
            $table->decimal('lesson_grade', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lesson_progresses', function (Blueprint $table) {
            $table->dropColumn('guided_practice_grade');
            $table->dropColumn('free_practice_grade');
            $table->dropColumn('quiz_grade');
            $table->dropColumn('lesson_grade');

            $table->boolean('guided_practice_completed')->default(false);
            $table->boolean('free_practice_completed')->default(false);
            $table->boolean('quiz_completed')->default(false);
        });
    }
}
