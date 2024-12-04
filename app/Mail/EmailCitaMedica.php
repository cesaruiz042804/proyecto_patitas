<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Mime\Email;

class EmailCitaMedica extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $pet;

    public function __construct($name, $pet)
    {
        $this->name = $name;
        $this->pet = $pet;
    }

    public function build()
    {
        return $this->view('mails.consultationMail')
        ->with(['name' => $this->name])
        ->with(['pet' => $this->pet])
        ->withSymfonyMessage(function (Email $message) {
            $message->embed(fopen(public_path('recursos_donation/img_flayers.jpg'), 'r'), 'recursos_donation');
        });

        return $email;
    }
}
