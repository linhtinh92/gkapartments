<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentImgsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apartment_imgs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('apartment_id')->unsigned();
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('images')->nullable();
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
		Schema::drop('apartment_imgs');
	}

}
