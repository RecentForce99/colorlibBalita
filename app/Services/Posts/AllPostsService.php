<?php


namespace App\Services\Posts;

use App\Helpers\UrlHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AllPostsService
{
    public function getFullListOfPosts($pageId): \Illuminate\Contracts\Pagination\LengthAwarePaginator
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
            ->paginate(8, '*', 'pageId', $pageId);

        $posts->filter(
            function ($post) {
                $post->date = Carbon::parse($post->date)->format('F d, Y');
                $post->section_page_url = UrlHelper::getPostsSectionPageUrl($post->category_code);
                $post->detail_page_url = UrlHelper::getPostsDetailPageUrl($post->category_code, $post->post_code);
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
}
