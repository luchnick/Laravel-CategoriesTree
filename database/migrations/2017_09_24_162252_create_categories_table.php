<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->char('category_name', 200);
			$table->index('category_name');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
		Schema::table('categories', function ($table) {
			$table->dropIndex(['category_name']);
		});

        Schema::drop('categories');
    }
}
