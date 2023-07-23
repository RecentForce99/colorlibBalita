<?php

namespace App\Http\Controllers;

use App\Services\Posts\AllPostsService;
use App\Services\Posts\PostCategoriesService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getView(Request $request)
    {
        $currentPageId = $request->get('pageId');
        $posts = $this->getPostListWithPagination($currentPageId);

        $categoriesService = new PostCategoriesService();

        return view('main.index', [
            'posts' => $posts,
            'categoriesList' => $categoriesService->getTopFiveCategories(),
        ]);
    }

    public function getPostListWithPagination($pageId = 1)
    {
        $posts = new AllPostsService();
        return $posts->getFullListOfPosts($pageId);
    }
}
