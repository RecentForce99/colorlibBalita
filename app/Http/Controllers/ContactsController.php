<?php

namespace App\Http\Controllers;

use App\Services\Contacts\ContactsFeedbackService;
use App\Services\Posts\PostCategoriesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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
        $validator = $contactsFeedbackService->validateRequest($request);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $status = $contactsFeedbackService->sendMail($validator->validated());
        $contactsFeedbackService->insertFeedbackFormDataToTable($validator->validated(), $status);

        return $status;
    }
}
