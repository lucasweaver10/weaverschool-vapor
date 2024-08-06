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
            $table->string('task')->nullable()->after('type');
            $table->renameColumn('type', 'exam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('essay_submissions', function (Blueprint $table) {
            $table->dropColumn('task');
            $table->renameColumn('exam', 'type');
        });
    }
};
