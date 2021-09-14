<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class RegistryConfirmation extends Mailable
{
    use SerializesModels;
    use Queueable;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $link = url(
            '/api/auth/registry/activate' .
            DIRECTORY_SEPARATOR .
            $this->user->id .
            DIRECTORY_SEPARATOR .
            $this->user->token
        );

        return $this->view('mail.mail', [
            'email' => $this->user->email,
            'link' => $link
        ]);
    }
}