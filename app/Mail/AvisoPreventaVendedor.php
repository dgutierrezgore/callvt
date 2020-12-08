<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AvisoPreventaVendedor extends Mailable
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
            'rsocemp' => $this->mailData['rsocemp'],
            'telcont' => $this->mailData['telcont'],
            'obspreventa' => $this->mailData['obspreventa']
        );

        return $this->view('correos.avisopreventavendedor')
            ->with([
                'data' => $mailData
            ]);
    }
}
