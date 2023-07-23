<?php

namespace App\Http\Controllers;

use App\Services\Posts\PostsParserService;
use Illuminate\Http\Request;

class PostsParserController extends Controller
{
    public function getView()
    {
        return view('parser.posts.index');
    }

    public function parseXml(Request $request)
    {
        $postsParserService = new PostsParserService();
        $postsParserService->parseXml($request->file('FILE')->getRealPath());
    }
}
