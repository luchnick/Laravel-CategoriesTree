<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->char('product_name', 200);
			$table->decimal('product_price', 7, 2);
			$table->index('product_name');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
		Schema::table('products', function ($table) {
			$table->dropIndex(['product_name']);
		});

        Schema::drop('products');
    }
}
