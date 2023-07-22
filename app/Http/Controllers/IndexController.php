<?php

namespace App\Http\Controllers;

use App\Models\Posts\Posts;
use App\Services\Posts\AllPosts;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getView()
    {
        $posts = new AllPosts();
        $fullListOfPosts = $posts->getFullListOfPosts();

        return view('main.index', [
            'fullListOfPosts' => $fullListOfPosts,
        ]);
    }
}
