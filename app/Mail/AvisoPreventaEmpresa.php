<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AvisoPreventaEmpresa extends Mailable
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
            'rutemp' => $this->mailData['rutemp'],
            'rsocemp' => $this->mailData['rsocemp'],
            'nombrecont' => $this->mailData['nombrecont'],
            'mailcont' => $this->mailData['mailcont'],
            'telcont' => $this->mailData['telcont'],
            'comunaemp' => $this->mailData['comunaemp'],
            'nivelint' => $this->mailData['nivelint'],
            'planofertado' => $this->mailData['planofertado'],
            'agendaof' => $this->mailData['agendaof'],
            'numadic' => $this->mailData['numadic'],
        );

        return $this->view('correos.avisopreventaemp')
            ->with([
                'data' => $mailData
            ]);
    }
}
