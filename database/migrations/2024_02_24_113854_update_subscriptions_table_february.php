<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // Add the 'type' column
            $table->string('type')->after('user_id')->nullable();

            // Remove the specified columns
            $table->dropColumn([
                'amount',
                'name',
                'plan_name',
                'start_date',
                'next_payment_date',
                'times',
                'interval',                
                'plan_id',
                'registration_id',
                'status',
                'active',
                'mollie_subscription_id',
                'mollie_customer_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // To reverse the migration, you would add back the columns removed
            // and remove the 'type' column. This example is simplified and assumes
            // the original columns' types for demonstration purposes.
            $table->dropColumn('type');

            // Add back the removed columns with assumed data types
            $table->decimal('amount', 8, 2);
            $table->integer('times');
            $table->string('interval');            
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('registration_id');
            $table->string('status');
            $table->boolean('active');
            $table->string('mollie_subscription_id');
            $table->string('mollie_customer_id');
        });
    }
};
