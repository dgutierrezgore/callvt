<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AvisoPostulacionRecibida extends Mailable
{
    use Queueable, SerializesModels;
    protected $mailData;

    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function build()
    {
        $mailData = array(
            'nombre' => $this->mailData['nombre'],
            'nombrecompleto' => $this->mailData['nombrecompleto'],
            'fono' => $this->mailData['fono'],
            'correo' => $this->mailData['correo'],
            'comuna' => $this->mailData['comuna'],
            'obs' => $this->mailData['obs'],
        );

        return $this->view('correos.avisopostrec')
            ->with([
                'data' => $mailData
            ]);
    }
}
