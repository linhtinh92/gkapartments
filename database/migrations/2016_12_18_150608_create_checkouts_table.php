<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checkouts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('company_name')->nullable();
            $table->string('email');
            $table->string('code');
            $table->string('phone');
            $table->integer('province');
            $table->string('total');
            $table->string('subtotal');
            $table->integer('district');
            $table->integer('checkout_type')->default(0);
            $table->string('address');
            $table->text('note')->nullable();;
            $table->tinyInteger('status')->default(0);
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
		Schema::drop('checkouts');
	}

}
