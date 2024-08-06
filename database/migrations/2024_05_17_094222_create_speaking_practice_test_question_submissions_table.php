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
        Schema::create('speaking_practice_test_question_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('speaking_practice_test_submission_id');          
            $table->unsignedBigInteger('speaking_practice_test_id');
            $table->unsignedBigInteger('speaking_practice_test_question_id');
            $table->unsignedBigInteger('user_id');
            $table->string('audio_path');
            $table->float('score');
            $table->text('transcription');
            $table->text('evaluation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speaking_practice_test_question_submissions');
    }
};
