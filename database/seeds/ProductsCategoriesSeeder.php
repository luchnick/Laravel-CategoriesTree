<?php

use Illuminate\Database\Seeder;

class ProductsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
		$categories = range(1, CategoriesSeeder::CATEGORIES_LIMIT);

        for ($i = 1; $i < ProductsSeeder::PRODUCTS_LIMIT; $i++) {
            DB::table('products_categories')->insert([
                'product_id' => $i,
                'category_id' => $categories[mt_rand(0, count($categories) - 1)],
            ]);

            $randomCategory = $categories[mt_rand(0, count($categories) - 1)];
            if (0 === $randomCategory % 2) {
                DB::table('products_categories')->insert([
                    'product_id' => $i,
                    'category_id' => $categories[mt_rand(0, count($categories) - 1)],
                ]);
            }
        }
    }
}
