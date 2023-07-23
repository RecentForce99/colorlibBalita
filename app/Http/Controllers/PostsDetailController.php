<?php

namespace App\Http\Controllers;

use App\Services\Posts\PostCategoriesService;
use App\Services\Posts\PostDetailService;


class PostsDetailController extends Controller
{
    public function getView($categoryCode, $postCode)
    {
        $postCategoriesService = new PostCategoriesService();
        $postDetailService = new PostDetailService();

        $categoryInfo = $postCategoriesService->getCategoryInfoByCode($categoryCode);
        $postInfo = $postDetailService->getPostInfoByCode($postCode);

        if (empty($categoryInfo) || empty($postInfo)) {
            abort(404);
        }

        return view('posts.detail', [
            'post' => $postInfo,
            'categoriesList' => $postCategoriesService->getTopFiveCategories(),
            'categoryInfo' => $categoryInfo,
        ]);
    }
}
