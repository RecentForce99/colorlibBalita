<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function sendFeedback(\Illuminate\Support\Facades\Request $request)
    {
        dd($request);
    }
}
