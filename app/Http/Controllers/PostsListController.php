<?php

namespace App\Http\Controllers;

use App\Models\Posts\Posts;
use App\Services\Posts\PostCategoriesService;
use Illuminate\Http\Request;

class PostsListController extends Controller
{
    public function getView($categoryCode, Request $request)
    {
        $currentPageId = $request->get('pageId');

        $postCategoriesService = new PostCategoriesService();
        $categoryInfo = $postCategoriesService->getCategoryInfoByCode($categoryCode);

        if (empty($categoryInfo)) {
            abort(404);
        }

        $posts = $postCategoriesService->getPostsByCategoryCode($categoryInfo->id, $currentPageId);

        return view('posts.list', [
            'posts' => $posts,
            'categoryName' => $categoryInfo->name,
            'categoriesList' => $postCategoriesService->getTopFiveCategories(),

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
}
