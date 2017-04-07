<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomImagesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_images', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('room_type_id')->unsigned();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
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
		Schema::drop('room_images');
	}

}
