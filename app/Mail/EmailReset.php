<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class EmailReset extends Mailable
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Восстановление пароля')
                    ->view('emails.reset-password')
                    ->with(['token' => $this->token]);
    }
}
