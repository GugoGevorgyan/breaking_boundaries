<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Breaking_boundaries extends Mailable
{
    use Queueable, SerializesModels;


    public $feedback;
    public $password;
    public $email;

    /**
     * Create a new message instance.
     *
     * Breaking_boundaries constructor.
     * @param $feedback
     * @param $password
     * @param $email
     */
    public function __construct($feedback, $password,$email)
    {
        $this->feedback = $feedback;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.email');
    }
}
