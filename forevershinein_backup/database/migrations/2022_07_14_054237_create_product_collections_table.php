<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_collections', function (Blueprint $table) {
            $table->id();
			$table->string('name',200);
			$table->string('variant_product_id',200);
			$table->string('sku_id')->unique();
			$table->string('slug')->unique();
			$table->decimal('sale_price',18,2)->default('0.00');
			$table->string('canada_stock',100);
			$table->string('usa_stock',100);
			$table->string('india_stock',100);
			$table->string('images');
			$table->string('package_length',100);
			$table->string('package_breadth',100);
			$table->string('package_height',100);
			$table->string('package_weight',100);
			$table->string('package_label',100);
			$table->string('meta_title');
			$table->text('meta_keywords');
			$table->text('meta_description');
			$table->enum('status',['0','1'])->comment('0=>Pending,1=>Active')->default(0);
			$table->enum('recyclebin_status',['0','1'])->comment('0=>No,1=>Yes')->default(0);
			$table->dateTime('recyclebin_datetime')->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_collections');
    }
}
