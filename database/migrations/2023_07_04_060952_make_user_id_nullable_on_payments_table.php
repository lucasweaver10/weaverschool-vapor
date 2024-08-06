<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeUserIdNullableOnPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Make 'user_id' and 'mollie_payment_id' nullable
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->string('mollie_payment_id')->nullable()->change();

            // Add 'stripe_payment_id' column
            $table->string('stripe_payment_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Revert changes in 'user_id' and 'mollie_payment_id' columns
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            $table->string('mollie_payment_id')->nullable(false)->change();

            // Drop 'stripe_payment_id' column
            $table->dropColumn('stripe_payment_id');
        });
    }
}
