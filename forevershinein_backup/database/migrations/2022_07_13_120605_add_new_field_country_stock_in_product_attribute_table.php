<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldCountryStockInProductAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variantproducts',function(Blueprint $table){
			$table->dropColumn('stock');
			$table->string('canada_stock')->after('images');
			$table->string('usa_stock')->after('canada_stock');
			$table->string('india_stock')->after('usa_stock');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_attribute', function (Blueprint $table) {
            //
        });
    }
}
