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
use Illuminate\Support\Facades\Storage;
=======

>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6

class ConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

<<<<<<< HEAD
    
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
    public function __construct($token)
    {
        $this->token = $token;
    }

<<<<<<< HEAD
    public function build()
    {
        return $this->view('mails.confirmationMail')
        ->with(['token' => $this->token])
        ->withSymfonyMessage(function (Email $message) {
            $message->embed(fopen(public_path('recursos_donation/img_flayers.jpg'), 'r'), 'recursos_donation');
        });

        return $email;
    }

    
    /*

=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
    public function content(): Content
    {
        
        return new Content(
            view: 'mails/confirmationMail',
            with: [
                'token' => $this->token
            ]
        );
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación para crear usuario',
        );
    }

<<<<<<< HEAD
    */

=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
<<<<<<< HEAD

    /*
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
    public function attachments(): array
    {
        return [];
    }
<<<<<<< HEAD
        */

    //public function build()
    //{
    /*
        return $this->view('mails.confirmationMail')
            ->with([
                'token' => $this->token,
            ])
            ->attach(public_path('img_public/img_check.png')) 
            ->withSwiftMessage(function ($message) {
                //$message->embed(public_path('img_public/img_check.png'));
            });
            */

    // }

/*
    public function build()
    {
        return $this->view('mails.confirmationMail')
        ->with(['token' => $this->token])
        ->withSymfonyMessage(function (Email $message) {
            // Ruta a la imagen que quieres incrustar
            //$path = public_path('img_public/img_check.png');

            // Incrustar la imagen con un Content-ID (CID)
            //$message->embed(fopen($path, 'r'), 'img_check');

            $message->embed(fopen(public_path('recursos_donation/img_flayers.jpg'), 'r'), 'recursos_donation');
            /*
            $message->embed(fopen(public_path('img_public/img_check.png'), 'r'), 'img_check');
            $message->embed(fopen(public_path('img_public/img_youtube.png'), 'r'), 'img_youtube');
            $message->embed(fopen(public_path('img_public/img_twitter.png'), 'r'), 'img_twitter');
            $message->embed(fopen(public_path('img_public/img_instagram.png'), 'r'), 'img_instagram');
            $message->embed(fopen(public_path('img_public/img_facebook.png'), 'r'), 'img_facebook');
            
        });

        return $email;
    }
    */
    
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
}
