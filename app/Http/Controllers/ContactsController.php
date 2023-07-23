<?php

namespace App\Http\Controllers;

use App\Services\Contacts\ContactsFeedbackService;
use App\Services\Posts\PostCategoriesService;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function getView()
    {
        $categoriesService = new PostCategoriesService();

        return view('contacts.index', [
            'categoriesList' => $categoriesService->getTopFiveCategories(),
        ]);
    }

    public function sendMail(Request $request)
    {
        $contactsFeedbackService = new ContactsFeedbackService();
        $status = $contactsFeedbackService->sendMail($request);
        $contactsFeedbackService->addFeedbackFormDataToTable($request, $status);

        return $status;
    }
}
