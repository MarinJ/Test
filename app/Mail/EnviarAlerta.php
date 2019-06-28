<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Catalogo;

class EnviarAlerta extends Mailable
{
    use Queueable, SerializesModels;
    public $alertMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Catalogo $alertMail)
    {
        $this->alertMail = $alertMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.alerta');
    }
}
