<?php


namespace App\Services\Posts;

use Illuminate\Support\Facades\DB;

class CategoriesService
{
    public function getRandomFiveCategories()
    {
        return DB::table('post_categories')
            ->join('posts', 'post_categories.id', '=', 'posts.category_id')
            ->select(
                'post_categories.id',
                'post_categories.name as category_name',
                'post_categories.code as category_code',
                DB::raw('COUNT(posts.id) as posts_count')
            )
            ->groupBy('post_categories.id', 'post_categories.name', 'post_categories.code')
            ->orderByDesc('posts_count')
            ->limit(5)
            ->get()
            ->map(function ($category) {
                $category->section_page_url = "/posts/{$category->category_code}/";
                return $category;
            });
    }
}

