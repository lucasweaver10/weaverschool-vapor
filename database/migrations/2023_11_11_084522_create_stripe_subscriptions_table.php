<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStripeSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripe_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('stripe_id')->unique(); // Stripe subscription ID
            $table->string('stripe_status'); // Subscription status (e.g., active, canceled)
            $table->string('stripe_price_id')->nullable(); // ID of the Stripe price
            $table->integer('quantity')->default(1); // Quantity (useful for multi-quantity subscriptions)
            $table->timestamp('trial_ends_at')->nullable(); // Trial end date
            $table->timestamp('ends_at')->nullable(); // Subscription end date (for canceled subscriptions)
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
        Schema::dropIfExists('stripe_subscriptions');
    }
}
