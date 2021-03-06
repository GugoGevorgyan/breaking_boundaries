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
    public $email;

    /**
     * Create a new message instance.
     *
     * Breaking_boundaries constructor.
     * @param $feedback
     * @param $email
     */
    public function __construct($feedback, $email)
    {
        $this->feedback = $feedback;
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
