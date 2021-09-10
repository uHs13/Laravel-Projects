<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\User;

class LoginMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
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
        return $this->view('emails.login', [
            'name' => $this->user->name,
            'datetime' => date('d/m/Y - H:i:s')
        ])->attach(
            base_path() . 
            DIRECTORY_SEPARATOR . 
            'files' .
            DIRECTORY_SEPARATOR .
            'attachment' .
            DIRECTORY_SEPARATOR .
            'attachment.odt'
        );
    }
}