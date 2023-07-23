<?php


namespace App\Services\Contacts;

use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsFeedbackService
{
    public function sendMail(Request $request): bool
    {
        $status = true;
        $data = [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'justMessage' => $request->get('message'),
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

    public function addFeedbackFormDataToTable(Request $request, $status): void
    {
        $currentDate = Carbon::now();
        Feedback::insert([
           'name' => $request->get('name'),
           'phone' => $request->get('phone'),
           'email' => $request->get('email'),
           'message' => $request->get('message'),
           'status' => $status,
           'created_at' => $currentDate,
           'updated_at' => $currentDate,
        ]);
    }
}
