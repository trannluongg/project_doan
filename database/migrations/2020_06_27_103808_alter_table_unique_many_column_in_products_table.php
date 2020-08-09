<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUniqueManyColumnInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique('products_pro_brand_unique');
            $table->dropUnique('products_pro_category_unique');
            $table->dropUnique('products_pro_producer_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unique('pro_brand');
            $table->unique('pro_category');
            $table->unique('pro_producer');
        });
    }
}
