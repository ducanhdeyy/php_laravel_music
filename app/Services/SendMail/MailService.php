<?php

namespace App\Services\SendMail;

use App\Mail\SendMail;
use Exception;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function sendMail($user)
    {
        try {
           
            $mail = new SendMail($user);

            return Mail::to(@$user->email)->queue($mail);
        } catch (\Throwable $th) {
            throw new Exception(__('messages.send_mail_failed'));
        }
    }
}
