<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('products_categories', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('product_id');
			$table->unsignedInteger('category_id');
			$table->index('product_id');
			$table->index('category_id');
			$table->foreign('product_id')
				->references('id')->on('products')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->foreign('category_id')
				->references('id')->on('categories')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::table('products_categories', function ($table) {
			$table->dropForeign(['category_id']);
			$table->dropForeign(['product_id']);
			$table->dropIndex(['product_id']);
			$table->dropIndex(['category_id']);
		});

		Schema::drop('products_categories');
	}
}
