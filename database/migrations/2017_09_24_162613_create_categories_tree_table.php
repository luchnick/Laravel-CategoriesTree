<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTreeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categories_tree', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ancestor_id');
            $table->unsignedInteger('descendant_id');
            $table->index('ancestor_id');
            $table->index('descendant_id');
            $table->foreign('ancestor_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('descendant_id')
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
		Schema::table('categories_tree', function ($table) {
			$table->dropForeign(['ancestor_id']);
			$table->dropForeign(['descendant_id']);
			$table->dropIndex(['ancestor_id']);
			$table->dropIndex(['descendant_id']);
		});

        Schema::drop('categories_tree');
    }
}
