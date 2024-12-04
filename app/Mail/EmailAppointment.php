<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Mime\Email;
use Carbon\Carbon;

class EmailAppointment extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $pet;
    public $date_and_hour;

    public function __construct($name, $pet, $date_and_hour)
    {
        $this->name = $name;
        $this->pet = $pet;
        $this->date_and_hour = $date_and_hour;
    }

    public function build()
    {
        // Crear una instancia de Carbon
        $carbonDate = Carbon::parse($this->date_and_hour);

        // Obtener solo la fecha
        $date = $carbonDate->toDateString(); // 2024-12-02

        // Obtener solo la hora
        $hour = $carbonDate->toTimeString(); // 14:30:00

        return $this->view('mails.appointmentMail')
            ->with(['name' => $this->name])
            ->with(['pet' => $this->pet])
            ->with(['date' => $date])
            ->with(['hour' => $hour])
            ->withSymfonyMessage(function (Email $message) {
                $message->embed(fopen(public_path('recursos_donation/img_flayers.jpg'), 'r'), 'recursos_donation');
            });

        return $email;
    }
}
