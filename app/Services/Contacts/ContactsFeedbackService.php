<?php


namespace App\Services\Contacts;

use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactsFeedbackService
{
    public function sendMail($request): bool
    {
        $status = true;
        $data = [
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'justMessage' => $request['message'],
        ];

        try {
            //Allows to send mail to only self, because it's test version
            //As smtp with Mailgun is used
            Mail::send('mail.contacts', $data,
                function ($message) use ($data) {
                    $message->to(env('MAIL_TO_ADDRESS'))->subject('New feedback');
                    $message->from(env('MAIL_TO_ADDRESS'));
                });
        } catch (\Exception $e) {
            $status = false;
        }

        return $status;
    }

    public function insertFeedbackFormDataToTable($request, $status): void
    {
        $currentDate = Carbon::now();
        Feedback::insert([
           'name' => $request['name'],
           'phone' => $request['phone'],
           'email' => $request['email'],
           'message' => $request['message'],
           'status' => $status,
           'created_at' => $currentDate,
           'updated_at' => $currentDate,
        ]);
    }

    public function validateRequest(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|max:13',
            'email' => 'required|max:255' ,
            'message' => 'required',
        ], [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute max size is 255 symbols',
        ]);
    }
}
