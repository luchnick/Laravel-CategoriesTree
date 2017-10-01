<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
		$this->call(ProductsSeeder::class);
		$this->call(ProductsCategoriesSeeder::class);
		$this->call(CategoriesTreeSeeder::class);
    }
}
