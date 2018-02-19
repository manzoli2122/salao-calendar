<?php

namespace Manzoli2122\Salao\Cadastro\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Manzoli2122\Salao\Cadastro\Models\Operadora;

class OperadoraMail extends Mailable
{
    use Queueable, SerializesModels;


    public $operadora;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Operadora $operadora)
    {
        $this->operadora = $operadora;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');

        return $this->from('manzoli.elisandra@gmail.com')
                ->view('cadastro::emails.operadoras.operadora');
    }
}
