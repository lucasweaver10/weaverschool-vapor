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
        Schema::create('cultural_note_learning_path', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cultural_note_id')->constrained()->onDelete('cascade');
            $table->foreignId('learning_path_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultural_note_learning_path');
    }
};
