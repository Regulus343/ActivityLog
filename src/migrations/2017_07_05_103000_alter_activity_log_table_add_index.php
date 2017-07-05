<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterActivityLogTableAddIndex extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('activity_log', function($table)
		{
			$table->index(['content_id', 'content_type'], 'idx_content');
			$table->index('user_id', 'user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('activity_log', function($table)
		{
			$table->dropIndex('idx_content');
			$table->dropIndex('user_id');
		});
	}

}