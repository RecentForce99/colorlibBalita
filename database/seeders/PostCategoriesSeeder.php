<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDate = now();
        DB::table('post_categories')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Food',
                    'code' => 'food',
                    'priority' => 500,
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ],
                [
                    'id' => 2,
                    'name' => 'Travel',
                    'code' => 'travel',
                    'priority' => 500,
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ],
                [
                    'id' => 3,
                    'name' => 'Lifestyle',
                    'code' => 'lifestyle',
                    'priority' => 500,
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ],
                [
                    'id' => 4,
                    'name' => 'Design',
                    'code' => 'design',
                    'priority' => 500,
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ],
                [
                    'id' => 5,
                    'name' => 'News',
                    'code' => 'news',
                    'priority' => 500,
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ],
                [
                    'id' => 6,
                    'name' => 'Web Development',
                    'code' => 'web-development',
                    'priority' => 500,
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ],
                [
                    'id' => 7,
                    'name' => 'Courses',
                    'code' => 'courses',
                    'priority' => 500,
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ],
                [
                    'id' => 8,
                    'name' => 'HTML',
                    'code' => 'html',
                    'priority' => 500,
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ],
            ]
        );
    }
}
