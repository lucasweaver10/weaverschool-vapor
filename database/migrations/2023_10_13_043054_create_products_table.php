<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Unique Identifier
            $table->string('name'); // Product Name
            $table->text('description'); // Product Description
            $table->string('slug')->unique(); // Product Slug
            $table->string('image')->nullable(); // Product Image
            $table->enum('status', ['Active', 'Inactive', 'Archived']); // Availability Status
            $table->unsignedBigInteger('category_id')->nullable(); // Category Identifier (Foreign Key)
            $table->timestamps(); // Created At & Updated At
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
