<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveActiveFromRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn('active'); // delete the 'active' column
            $table->string('status')->after('course_id'); // create a new 'status' column after the 'course_id' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->boolean('active')->default(false); // add back the 'active' column
            $table->dropColumn('status'); // delete the 'status' column
        });
    }
}
