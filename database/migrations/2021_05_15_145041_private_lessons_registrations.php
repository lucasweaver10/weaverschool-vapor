<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrivateLessonsRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_lessons_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('user_name');
            $table->unsignedInteger('private_lessons_id');
            $table->string('private_lessons_name');
            $table->unsignedInteger('total_hours');
            $table->unsignedInteger('hours_completed')->default(0);
            $table->unsignedInteger('outstanding_balance');
            $table->unsignedInteger('total_paid')->default(0);
            $table->tinyInteger('active')->default('1');
            $table->string('experience');
            $table->unsignedInteger('teacher_id')->nullable();
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
        //
    }
}
