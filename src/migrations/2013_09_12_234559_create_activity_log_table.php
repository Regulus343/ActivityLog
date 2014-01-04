<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_log', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('content_id');
			$table->string('content_type', 72);
			$table->string('action', 32);
			$table->string('description');
			$table->string('details');
			$table->boolean('developer');
			$table->string('ip_address', 64);
			$table->string('user_agent');
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
		Schema::drop('activity_log');
	}

}
