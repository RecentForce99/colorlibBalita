<?php

namespace App\Http\Controllers;

use App\Models\Posts\Posts;
use App\Services\Posts\AllPostsService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getView()
    {
        $posts = new AllPostsService();
        $fullListOfPosts = $posts->getFullListOfPosts();

        return view('main.index', [
            'fullListOfPosts' => $fullListOfPosts,
        ]);
    }
}
