<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Foreign Key from products table
            $table->enum('type', ['Oneoff', 'Recurring']); // Price Type
            $table->decimal('amount', 10, 2); // Price amount
            $table->json('localized_amount'); // Localized Price amounts in different currencies
            $table->string('currency', 3); // Currency code, like 'USD'
            $table->string('stripe_price_id')->unique(); // Stripe Price Identifier
            $table->enum('billing_period', ['Monthly', 'Annual'])->nullable(); // Billing period for recurring payments
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
        Schema::dropIfExists('product_prices');
    }
}
