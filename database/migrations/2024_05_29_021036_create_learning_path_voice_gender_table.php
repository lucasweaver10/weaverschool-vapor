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
        Schema::create('learning_path_voice_gender', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('learning_path_id');
            $table->unsignedBigInteger('voice_gender_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('learning_path_id')->references('id')->on('learning_paths')->onDelete('cascade');
            $table->foreign('voice_gender_id')->references('id')->on('voice_genders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_path_voice_gender');
    }
};
