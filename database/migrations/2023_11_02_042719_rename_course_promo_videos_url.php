<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCoursePromoVideosUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_promo_videos', function (Blueprint $table) {
            $table->renameColumn('url', 'vimeo_video_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_promo_videos', function (Blueprint $table) {
            $table->renameColumn('vimeo_video_id', 'url');
        });
    }
}
