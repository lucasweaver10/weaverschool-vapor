<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePriceColumnsOnPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->json('total_price')->nullable()->change();
            $table->json('monthly_price')->nullable()->change();
            $table->json('discounted_total_price')->nullable()->after('monthly_price');
            $table->json('discounted_monthly_price')->nullable()->after('discounted_total_price');
            $table->integer('discount_percentage')->nullable()->after('discounted_monthly_price');
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
