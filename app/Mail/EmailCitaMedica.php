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

    public $pet;
    public $datetime;
    public $date;
    public $hour;

    public function __construct($pet, $datetime)
    {
        $this->pet = $pet;
        $this->datetime = $datetime;
    }

    public function build()
    {
        list($this->date, $this->hour) = explode(' ', $this->datetime);

        return $this->view('mails.consultationMail')
        ->with(['pet' => $this->pet])
        ->with(['date' => $this->date])
        ->with(['hour' => $this->hour])
        ->withSymfonyMessage(function (Email $message) {
            $message->embed(fopen(public_path('recursos_donation/img_flayers.jpg'), 'r'), 'recursos_donation');
        });

        return $email;
    }
}
