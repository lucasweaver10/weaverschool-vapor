<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseContentBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_content_blocks', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('course_id'); // Foreign key to link with the courses table
            $table->string('type'); // The type of the content block (e.g., 'introduction', 'summary', etc.)
            $table->longText('content'); // The actual content of the block
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade'); // This will automatically delete content blocks associated with a course when the course is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_content_blocks');
    }
}
