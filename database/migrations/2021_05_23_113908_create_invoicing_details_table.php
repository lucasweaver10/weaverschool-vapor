<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicing_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('user_name');
            $table->string('company_name');
            $table->string('send_invoices_to_attention');
            $table->string('send_invoices_to_email');
            $table->string('address1');
            $table->string('address2');
            $table->unsignedInteger('zipcode');
            $table->string('city');
            $table->string('country');
            $table->unsignedInteger('chamber_of_commerce_number');
            $table->unsignedInteger('tax_number');
            $table->unsignedInteger('moneybird_customer_id');
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
        Schema::dropIfExists('invoicing_details');
    }
}
