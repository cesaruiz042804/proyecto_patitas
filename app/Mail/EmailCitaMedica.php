<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
use Symfony\Component\Mime\Email;
=======
<<<<<<< HEAD
use Symfony\Component\Mime\Email;
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d

class EmailCitaMedica extends Mailable
{
    use Queueable, SerializesModels;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
    public $pet;
    public $date;
    public $hour;

    public function __construct($pet, $date, $hour)
<<<<<<< HEAD
=======
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
=======
    /**
     * Create a new message instance.
     */
    public function __construct()
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
    {
        $this->pet = $pet;
        $this->date = $date;
        $this->hour = $hour;
    }

<<<<<<< HEAD
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
=======
    /**
     * Get the message envelope.
     */
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
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
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
    public function attachments(): array
    {
        return [];
    }
<<<<<<< HEAD
    */


=======
<<<<<<< HEAD
    */


=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
}
