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

        if (empty($categoryInfo->id) || empty($postInfo) || ($categoryInfo->id != $postInfo->category_id)) {
            abort(404);
        }

        return view('posts.detail', [
            'post' => $postInfo,
            'categoriesList' => $postCategoriesService->getTopFiveCategories(),
            'categoryInfo' => $categoryInfo,
            'relatedPosts' => $postDetailService->getRelatedPosts($categoryCode, $postCode),
        ]);
    }
}
