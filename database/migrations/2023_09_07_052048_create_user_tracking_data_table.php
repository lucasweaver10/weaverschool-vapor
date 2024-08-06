<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTrackingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tracking_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->text('first_page_visited')->nullable();
            $table->text('converting_page_url')->nullable();
            $table->text('referer')->nullable();
            $table->text('last_touch_utm_source')->nullable();
            $table->text('last_touch_utm_campaign')->nullable();
            $table->text('last_touch_utm_medium')->nullable();
            $table->text('last_touch_utm_term')->nullable();
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
        Schema::dropIfExists('user_tracking_data');
    }
}
