<?php


namespace App\Services\Posts;

use App\Helpers\UrlHelper;
use App\Models\Posts\PostCategories;
use Carbon\Carbon;
use http\Encoding\Stream\Deflate;
use Illuminate\Support\Facades\DB;

class PostCategoriesService
{
    public function getPostsByCategoryCode($categoryId, $pageId)
    {
        $posts = DB::table('posts')
            ->join('post_categories', 'posts.category_id', '=', 'post_categories.id')
            ->select(
                'posts.name as post_name',
                'posts.code as post_code',
                'posts.preview_picture',
                'posts.date',
                'post_categories.id as category_id',
                'post_categories.name as category_name',
                'post_categories.code as category_code'
            )
            ->orderByDesc('posts.priority')
            ->where('category_id', '=', $categoryId)
            ->paginate(8, '*', 'pageId', $pageId);

        $posts->filter(
            function ($post) {
                $post->date = Carbon::parse($post->date)->format('F d, Y');
                $post->section_page_url = "/posts/{$post->category_code}/";
                $post->detail_page_url = "/posts/{$post->category_code}/{$post->post_code}/";
            }
        );

        //For pagination
        $previousPageId = $posts->currentPage()-1;
        $nextPageId = $posts->currentPage()+1;

        $posts->previousPageClass = $posts->currentPage() <= 1 ? " disabled" : "#";
        $posts->previousPageHref = $posts->currentPage() > 1 ? "?pageId={$previousPageId}" : "#";

        $posts->nextPageClass = $posts->currentPage() >= $posts->lastPage() ? " disabled" : "#";
        $posts->nextPageHref = $posts->currentPage() < $posts->lastPage() ? "?pageId={$nextPageId}" : "#";

        $posts->pageRadius = 2;

        return $posts;
    }

    public function getTopFiveCategories()
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
