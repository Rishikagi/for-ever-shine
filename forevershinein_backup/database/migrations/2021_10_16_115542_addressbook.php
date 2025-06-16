<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addressbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addressbooks',function(Blueprint $table){
			$table->id();
			$table->foreignId('user_id')->constrained('users', 'id')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->string('name');
			$table->string('phone_code',100);
			$table->string('mobile');
			$table->string('email');
			$table->text('address_line1');
			$table->text('address_line2');
			$table->foreignId('country_id')->constrained('countries', 'id')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->integer('state_id')->default(0);
			$table->integer('city_id')->default(0);
			$table->string('pincode');
			$table->enum('type',['1','2'])->comment('1=>Home,2=>Office');
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
        //
    }
}
