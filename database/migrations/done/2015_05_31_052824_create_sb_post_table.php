<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSbPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sb_posts', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->integer('author_id');
			$table->string('head_article');
			$table->text('article');
			$table->string('img_banner');
			$table->string('file');
			$table->boolean('enabled')->default(1);
			$table->boolean('comments_enable')->default(0);
			$table->datetime('post_date');
			$table->integer('views');
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
		Schema::drop('sb_posts');
	}

}
