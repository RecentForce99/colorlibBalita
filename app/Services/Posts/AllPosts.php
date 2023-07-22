<?php


namespace App\Services\Posts;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AllPosts
{
    public function getFullListOfPosts(): \Illuminate\Support\Collection
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
            ->get();
        $posts->map(function ($post) {
            $post->date = Carbon::parse($post->date)->format('F d, Y');;
            $post->section_page_url = "/posts/{$post->category_code}/";
            $post->detail_page_url = "/posts/{$post->category_code}/{$post->post_code}/";
        });


        return $posts;
    }
}
