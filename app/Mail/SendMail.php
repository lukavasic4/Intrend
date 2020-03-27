<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $podaci;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($podaci)
    {
        $this->podaci = $podaci;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view("partials.email",$this->podaci);
    }
}
