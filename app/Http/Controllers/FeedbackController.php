<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class FeedbackController extends BaseController
{
    public function sendFeedback()
    {
        return ;
    }

    public function getView()
    {
        return view('contacts.index');
    }
}
