<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFlashcardProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_flashcard_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('flashcard_id');
            $table->unsignedBigInteger('flashcard_set_id');
            $table->enum('status', ['learning', 'learned', 'needs_review', 'mastered']);
            $table->integer('times_learned')->default(0);
            $table->timestamp('last_reviewed_at')->nullable();
            $table->timestamp('next_review_date')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('flashcard_id')->references('id')->on('flashcards')->onDelete('cascade');
            $table->foreign('flashcard_set_id')->references('id')->on('flashcard_sets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_flashcard_progress');
    }
}
