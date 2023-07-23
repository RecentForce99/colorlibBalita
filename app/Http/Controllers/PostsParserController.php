<?php

namespace App\Http\Controllers;

use App\Services\Posts\PostsParserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsParserController extends Controller
{
    public function getView()
    {
        return view('parser.posts.index');
    }

    public function parseXml(Request $request)
    {
        $postsParserService = new PostsParserService();
        $status = $postsParserService->parseXml($request->file('FILE')->getRealPath());

        if ($status) {
            return redirect()->back()->with('status', 'Success');
        } else {
            return redirect()->back()->withErrors(['status' => 'Error']);
        }
    }
}
