<?php


namespace App\Services\Posts;

use App\Helpers\UrlHelper;
use App\Models\Posts\Posts;
use Carbon\Carbon;

class AllPostsService
{
    public function getFullListOfPosts($pageId): \Illuminate\Pagination\LengthAwarePaginator
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
        ->paginate(8, '*', 'pageId', $pageId);

        $posts->filter(
            function ($post) {
                $post->date = Carbon::parse($post->date)->format('F d, Y');
                $post->section_page_url = UrlHelper::getPostsSectionPageUrl($post->category_code);
                $post->detail_page_url = UrlHelper::getPostsDetailPageUrl($post->category_code, $post->post_code);
            }
        );

        return $posts;
    }
}
