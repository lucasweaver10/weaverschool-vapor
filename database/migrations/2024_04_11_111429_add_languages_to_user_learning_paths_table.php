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
        Schema::table('user_learning_paths', function (Blueprint $table) {
            $table->string('target_locale')->nullable()->after('learning_path_id');
            $table->string('native_locale')->nullable()->after('learning_path_id');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_learning_paths', function (Blueprint $table) {
            //
        });
    }
};
