<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'products_categories',
            function (Blueprint $table) {
                $table->unsignedBigInteger('product_id')->unsigned();
                $table->unsignedBigInteger('category_id')->unsigned();
                $table->softDeletes();
                $table->timestamps();
                $table->foreign('product_id')->references('id')
                ->on('products');
                $table->foreign('category_id')->references('id')
                ->on('categories');
                $table->primary(['product_id', 'category_id']);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_categories');
    }
}
