<?php

namespace App\Http\Controllers;

use App\Models\Posts\Posts;
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

            //Pagination
            'currentPage' => $posts->currentPage(),
            'lastPage' => $posts->lastPage(),
            'pageRadius' => $posts->pageRadius,
            'previousPageClass' => $posts->previousPageClass,
            'nextPageClass' => $posts->nextPageClass,
            'previousPageHref' => $posts->previousPageHref,
            'nextPageHref' => $posts->nextPageHref,
        ]);
    }

    public function getPostListWithPagination($pageId = 1)
    {
        $posts = new AllPostsService();
        return $posts->getFullListOfPosts($pageId);
    }
}
