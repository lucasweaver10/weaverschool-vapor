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
            // Add 'Type' to the essay_submissions table after user_id column
            $table->string('type')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('essay_submissions', function (Blueprint $table) {
            // reverse the migration
            $table->dropColumn('type');
        });
    }
};
