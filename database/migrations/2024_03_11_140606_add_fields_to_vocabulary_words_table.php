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
        Schema::table('vocabulary_words', function (Blueprint $table) {
            $table->unsignedBigInteger('learning_path_id')->nullable()->after('word');
            $table->text('word')->change();
            $table->text('definition')->nullable()->change();            
            $table->text('example')->nullable()->change();             
            $table->text('explanation')->nullable();
            $table->text('audio_url')->nullable();
            $table->text('example_audio_url')->nullable();
            $table->string('image_url')->nullable();
            $table->text('romanized_word')->nullable()->after('word');
            $table->unsignedBigInteger('lesson_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vocabulary_words', function (Blueprint $table) {
            // Assuming the original type for text fields was 'text' or similar. Adjust according to your actual schema.
            $table->text('word')->change();
            $table->text('definition')->nullable()->change();
            $table->text('example')->nullable()->change();
            $table->text('explanation')->nullable()->change();
            $table->text('audio_url')->nullable()->change();
            $table->text('example_audio_url')->nullable()->change();

            // If 'romanized_word' and 'lesson_id' were added as part of a different migration, they might not need changes here.
            // If 'learning_path_id' was added in this migration, you would drop it. Otherwise, no action needed if it was already there.
            // Example of dropping a newly added column:
            $table->dropColumn('learning_path_id');
            $table->dropColumn('explanation');
            $table->dropColumn('audio_url');
            $table->dropColumn('example_audio_url');
            $table->dropColumn('image_url');
            $table->dropColumn('romanized_word');

            // Since 'image_url' was not modified, no change is needed.
        });
    }
};
