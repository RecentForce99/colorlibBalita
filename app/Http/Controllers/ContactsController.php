<?php

namespace App\Http\Controllers;


use App\Services\Posts\PostCategoriesService;

class ContactsController extends Controller
{
    public function getView()
    {
        $categoriesService = new PostCategoriesService();

        return view('contacts.index', [
            'categoriesList' => $categoriesService->getTopFiveCategories(),
        ]);
    }
}
