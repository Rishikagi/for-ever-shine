<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_coupons', function (Blueprint $table) {
            $table->id();
			$table->enum('business_type',['Small Business Owners','Custom Merchandise','Large distributors','Design studio']);
			$table->date('start_date');
			$table->date('end_date');
			$table->enum('discount_type',['1','2'])->default('1')->comment('1=>%,2=>Rs');
			$table->string('discount_amount',100)->default('0.00');
            $table->string('minorder_amount',100)->default('0');
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
        Schema::dropIfExists('business_coupons');
    }
}
