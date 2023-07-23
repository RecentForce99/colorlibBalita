<?php


namespace App\Services\Posts;


use App\Models\Posts\Posts;
use Carbon\Carbon;

class PostDetailService
{
    public function getPostInfoByCode(string $code)
    {
        $post = Posts::where('code', $code)->first();
        $post->date = Carbon::parse($post->date)->format('F d, Y');

        return $post;
    }
}
