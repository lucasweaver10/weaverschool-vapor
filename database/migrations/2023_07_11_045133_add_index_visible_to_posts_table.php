<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexVisibleToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('index_is_visible')->default(true);
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('index_is_visible');
            $table->dropColumn('featured');
            $table->dropColumn('subcategory_id');
            $table->dropColumn('course_id');
        });
    }
}
