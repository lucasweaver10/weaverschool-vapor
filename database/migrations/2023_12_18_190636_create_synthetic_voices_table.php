<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyntheticVoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('synthetic_voices', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('language');
            $table->string('locale');
            $table->string('voice_name');
            $table->string('ssml_gender')->nullable();
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
        Schema::dropIfExists('synthetic_voices');
    }
}
