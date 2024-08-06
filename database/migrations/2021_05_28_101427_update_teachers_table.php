<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->tinyInteger('active')->after('phone_number')->default('1');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('net_hourly_rate');
            $table->unsignedInteger('gross_hourly_rate');
            $table->unsignedInteger('years_experience');
            $table->string('calendly_link')->nullable();
            $table->string('languages_spoken')->nullable();
            $table->renameColumn('specialty', 'specialties');

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
