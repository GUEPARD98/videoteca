<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactanosMailable extends Mailable
{
    public $name;
    public $email;
    public $mensaje;
    public $subject;

    use Queueable, SerializesModels;

    /**
     * Create a new mensaje instance.
     *
     * @return void
     */
    public function __construct($name, $email, $mensaje, $subject)
    {
        $this->name = $name;
        $this->email = $email;
        $this->mensaje = $mensaje;
        $this->subject = $subject;
    }

    /**
     * Build the mensaje.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact', [
            'name' => $this->name,
            'email' => $this->email,
            'mensaje' => $this->mensaje,
            'subject' => $this->subject,
        ]);
    }
}
