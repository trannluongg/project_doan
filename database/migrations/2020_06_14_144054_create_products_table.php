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
            $table->increments('id');
            $table->string('pro_name', 191)->unique();
            $table->double('pro_price')->unique();
            $table->string('pro_image')->unique();
            $table->integer('pro_sale');
            $table->string('pro_description');
            $table->integer('pro_total');
            $table->integer('pro_brand')->unique();
            $table->integer('pro_producer')->unique();
            $table->integer('pro_category')->unique();
            $table->timestamps();
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
