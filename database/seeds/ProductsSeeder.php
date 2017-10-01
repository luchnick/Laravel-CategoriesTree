<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Products limit.
     */
    const PRODUCTS_LIMIT = 10000;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < self::PRODUCTS_LIMIT; ++$i) {
            try {
                $productName = $faker->unique()->jobTitle;
            } catch (\OverflowException $e) {
				$productName = $faker->unique(true)->jobTitle . ' ' . $faker->unique()->word;
            }

            DB::table('products')->insert([
                'product_name' => $productName,
                'product_price' => $faker->randomFloat(2, 0, 9999),
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            ]);
        }
    }
}
