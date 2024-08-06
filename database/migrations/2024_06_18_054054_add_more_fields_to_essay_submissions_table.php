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
        Schema::table('essay_submissions', function (Blueprint $table) {
            // add sentence_structure_feedback, vocabulary_feedback, transitions_feedback, and argument_feedback as text fields after 'feedback'
            $table->text('argument_feedback')->nullable()->after('feedback');
            $table->text('transitions_feedback')->nullable()->after('feedback');
            $table->text('vocabulary_feedback')->nullable()->after('feedback');
            $table->text('sentence_structure_feedback')->nullable()->after('feedback');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('essay_submissions', function (Blueprint $table) {
            // reverse the migrations
            $table->dropColumn('sentence_structure_feedback');
            $table->dropColumn('vocabulary_feedback');
            $table->dropColumn('transitions_feedback');
            $table->dropColumn('argument_feedback');
        });
    }
};
