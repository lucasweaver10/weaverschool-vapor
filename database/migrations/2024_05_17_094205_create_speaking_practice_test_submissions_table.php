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
        Schema::create('speaking_practice_test_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('speaking_practice_test_id');            
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->string('exam');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speaking_practice_test_submissions');
    }
};
