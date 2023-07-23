<?php

namespace App\Http\Controllers;

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

        $posts = $postCategoriesService->getPostsWithPaginationByCategoryCode($categoryCode, $currentPageId);

        return view('posts.list', [
            'posts' => $posts,
            'categoryName' => $categoryInfo->name,
            'categoriesList' => $postCategoriesService->getTopFiveCategories(),
        ]);
    }
}
