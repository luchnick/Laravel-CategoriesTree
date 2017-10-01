<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
	/**
	 * Categories limit
	 */
	const CATEGORIES_LIMIT = 52;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < self::CATEGORIES_LIMIT; ++$i) {
            DB::table('categories')->insert([
                'category_name' => $faker->unique()->company,
				'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            ]);
        }
    }
}
