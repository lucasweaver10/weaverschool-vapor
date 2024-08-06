<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('communication_preferences', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedInteger('user_id'); // Foreign key to users table (matches unsigned int)
            $table->string('email')->unique(); // Unique email address

            // Communication preferences fields
            $table->boolean('general_updates')->default(true); // General updates
            $table->boolean('promotional_offers')->default(true); // Promotional offers
            $table->boolean('newsletter')->default(false); // Newsletter
            $table->boolean('spaced_repetition')->default(true); // Spaced repetition reminders
            $table->boolean('processing_notifications')->default(true); // Processing notifications

            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication_preferences');
    }
};
