<?php


namespace App\Services\Posts;

use App\Helpers\UrlHelper;
use App\Models\Posts\PostCategories;
use App\Models\Posts\Posts;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostCategoriesService
{
    public function getPostsWithPaginationByCategoryCode(string $categoryCode, $pageId = 1): \Illuminate\Pagination\LengthAwarePaginator
    {
        $posts = Posts::select(
            'posts.name as post_name',
            'posts.code as post_code',
            'posts.preview_picture',
            'posts.date',
            'post_categories.id as category_id',
            'post_categories.name as category_name',
            'post_categories.code as category_code'
        )
        ->join('post_categories', 'posts.category_id', '=', 'post_categories.id')
        ->orderByDesc('posts.priority')
        ->where('post_categories.code', '=', $categoryCode)
        ->paginate(8, '*', 'pageId', $pageId);

        $posts->filter(
            function ($post) {
                $post->date = Carbon::parse($post->date)->format('F d, Y');
                $post->section_page_url = "/posts/{$post->category_code}/";
                $post->detail_page_url = "/posts/{$post->category_code}/{$post->post_code}/";
            }
        );

        return $posts;
    }

    public function getTopFiveCategories(): \Illuminate\Support\Collection
    {
        return PostCategories::select(
            'post_categories.id',
            'post_categories.name as category_name',
            'post_categories.code as category_code',
            DB::raw('COUNT(posts.id) as posts_count')
        )
        ->join('posts', 'post_categories.id', '=', 'posts.category_id')
        ->groupBy('post_categories.id', 'post_categories.name', 'post_categories.code')
        ->orderByDesc('posts_count')
        ->limit(5)
        ->get()
        ->map(function ($category) {
            $category->section_page_url = UrlHelper::getPostsSectionPageUrl($category->category_code);
            return $category;
        });
    }

    public function getCategoryInfoByCode(string $categoryCode)
    {
        $category = PostCategories::where('code', $categoryCode)
            ->select('id', 'name', 'code')
            ->first();

        if (empty($category)) {
            return;
        }

        $category->section_page_url = UrlHelper::getPostsSectionPageUrl($category->category_code);

        return $category;
    }
}
