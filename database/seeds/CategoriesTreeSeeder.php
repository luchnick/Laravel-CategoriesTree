<?php

use Illuminate\Database\Seeder;

class CategoriesTreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categoriesLimit = CategoriesSeeder::CATEGORIES_LIMIT;

        for ($i = 1; $i <= $categoriesLimit; $i += 4) {
            foreach (range(0, 3) as $level) {
                $ancestorId = $i + $level;
                $levelLimit = 4 - $level;

                for ($limit = 0; $limit < $levelLimit; ++$limit) {
                    $descendantId = $i + $level + $limit;

                    DB::table('categories_tree')->insert([
                        'ancestor_id' => $ancestorId,
                        'descendant_id' => $descendantId,
                    ]);
                }
            }
        }
    }
}
