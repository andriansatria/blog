<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSbCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sb_comments', function($table) {
			$table->increments('id');
			$table->string('post_id');
			$table->integer('reply_from_id');
			$table->text('comment');
			$table->string('user_id');
			$table->boolean('mark_read')->default(0);
			$table->boolean('enabled')->default(0);
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
		Schema::drop('sb_comments');
	}

}
