<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        $this->seed();
    }

    public function testCreateNewUser()
    {
        $payload = [
            'name' => 'John Doe',
            'email' => str_random() . '@gmail.com'
        ];

        Mail::fake();

        $response = $this->post(route('users.store'), $payload);

        $response->assertStatus(302);

        $this->assertFalse(session()->has('errors'));

        Mail::assertSent(EmailVerification::class, function ($mail) use ($payload) {
            return $mail->hasTo($payload['email']);
        });
    }
}
