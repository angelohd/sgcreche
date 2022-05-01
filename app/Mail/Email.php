<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
private string $email;
private string $codigo;
    public function __construct($email,$codigo)
    {
      $this->email = $email;
      $this->codigo = $codigo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $m = $this->email;
      $s = $this->codigo;
        return $this->from('geral.info@wisekumbu.com','Wise Kumbu')
        ->subject('Credencias para login')
        ->view('admin.email.crianca_na_creche',['m'=>$m,'s'=>$s])
        ;
    }

    // public function clienteregister(){
    //     return $this->from('geral.info@wisekumbu.com','Wise Kumbu')
    //     ->subject('bem vindo a wisekumbu')
    //     ->view('mail.clienteregister');
    // }
}
