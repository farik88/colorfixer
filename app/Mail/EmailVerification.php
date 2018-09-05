<?php

namespace App\Mail;

use App\User;
use Illuminate\Mail\Mailable;

class EmailVerification extends Mailable
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Подтверждение аккаунта')
                    ->view('emails.verification')
                    ->with(['user' => $this->user]);
    }
}
