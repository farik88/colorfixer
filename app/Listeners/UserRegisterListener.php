<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

class UserRegisterListener
{
    public function handle(Registered $event)
    {
        $user = $event->user;

        $email = new EmailVerification($user);

        Mail::to($user->email)->send($email);
    }
}
