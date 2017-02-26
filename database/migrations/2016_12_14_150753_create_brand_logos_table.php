<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandLogosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brand_logos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('images')->nullable();
            $table->longText('content')->nullable();
            $table->tinyInteger('status')->default(1);
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
		Schema::drop('brand_logos');
	}

}
