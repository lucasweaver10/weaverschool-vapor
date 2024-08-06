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
            // add nullable string image_url column after score with longer character allowment
            $table->text('image_url')->nullable()->after('score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('essay_submissions', function (Blueprint $table) {
            // reverse the migration
            $table->dropColumn('image_url');
        });
    }
};
