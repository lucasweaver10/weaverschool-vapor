<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEndedAtToStripeSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stripe_subscriptions', function (Blueprint $table) {
            // add cancelled_at to the stripe_subscriptions table //
            $table->timestamp('cancelled_at')->nullable()->after('trial_ends_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stripe_subscriptions', function (Blueprint $table) {
            //
        });
    }
}
