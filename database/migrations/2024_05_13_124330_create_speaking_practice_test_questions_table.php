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
        Schema::create('speaking_practice_test_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('speaking_practice_test_id');            
            $table->string('part');
            $table->text('text');
            $table->string('audio_url')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('time')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_speaking_test_questions');
    }
};
