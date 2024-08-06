<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('type');
            $table->unsignedInteger('private_lessons_id')->nullable();
            $table->string('private_lessons_name')->nullable();
            $table->unsignedInteger('total_hours')->nullable();
            $table->unsignedInteger('hours_completed')->default(0);
            $table->unsignedInteger('hourly_rate')->default(0);
            $table->unsignedInteger('teacher_id')->nullable();
            $table->string('experience')->nullable();
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
