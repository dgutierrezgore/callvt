<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AvisoMensajeOperadora extends Mailable
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
            'nombre_cli' => $this->mailData['nombre_cli'],
            'nombre' => $this->mailData['nombre'],
            'empresa' => $this->mailData['empresa'],
            'fono_princ' => $this->mailData['fono_princ'],
            'fono_secun' => $this->mailData['fono_secun'],
            'correo_elec' => $this->mailData['correo_elec'],
            'mensaje' => $this->mailData['mensaje'],
            'acc_rapida1' => $this->mailData['acc_rapida1'],
            'acc_rapida2' => $this->mailData['acc_rapida2'],
            'acc_rapida3' => $this->mailData['acc_rapida3'],
            'derivacion' => $this->mailData['derivacion'],
        );

        return $this->view('correos.avisomensajeope')
            ->with([
                'data' => $mailData
            ]);
    }
}
