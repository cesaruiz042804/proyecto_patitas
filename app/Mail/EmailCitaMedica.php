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
    public $date;
    public $hour;

    public function __construct($pet, $date, $hour)
    {
        $this->pet = $pet;
        $this->date = $date;
        $this->hour = $hour;
    }

    public function build()
    {
        return $this->view('mails.consultationMail')
        ->with(['pet' => $this->pet])
        ->with(['date' => $this->date])
        ->with(['hour' => $this->hour])
        ->withSymfonyMessage(function (Email $message) {
            $message->embed(fopen(public_path('recursos_donation/img_flayers.jpg'), 'r'), 'recursos_donation');
        });

        return $email;
    }


    /*
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Cita Medica',
        );
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    /**
     * Get the message content definition.
     */
    /*
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
 
    public function attachments(): array
    {
        return [];
    }
    */


}
