<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddB2BFieldInVarientProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variantproducts',function(Blueprint $table){
			
			$table->enum('b2b',['1','2'])->comment('1=>Yes,1=>No')->default(2)->after('sale_price');
			$table->integer('b2b_min_qty')->nullable()->after('b2b');
			$table->decimal('b2b_price',18,2)->default('0.00')->after('b2b_min_qty');
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('varient_product', function (Blueprint $table) {
            //
        });
    }
}
