<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable()->after('email');

            $table->dropColumn('company_id');
            $table->dropColumn('mollie_id');
            $table->dropColumn('mollie_active');
            $table->dropColumn('mollie_mandate_id');
            $table->dropColumn('level_test_score');
            $table->dropColumn('level');
            $table->dropColumn('mollie_customer_id');
            $table->dropColumn('has_invoicing');
            $table->dropColumn('company_name');
            $table->dropColumn('moneybird_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the columns back if you rollback this migration
            $table->integer('company_id')->nullable();
            $table->string('mollie_id')->nullable();
            $table->boolean('mollie_active')->default(false);
            $table->integer('level_test_score')->nullable();
            $table->string('level')->nullable();
            $table->string('mollie_customer_id')->nullable();
            $table->boolean('has_invoicing')->default(false);
            $table->string('company_name')->nullable();
            $table->string('moneybird_id')->nullable();

            $table->dropColumn('email_verified_at');
        });
    }
}
