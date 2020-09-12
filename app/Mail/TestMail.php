<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User,Role,Sucursale;
use Illuminate\Support\Facades\DB;


class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
       $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
       /* return $this->from('cicon820@gmail.com')->subject('HOLIIIIII')
        ->view('productos')->with('data',$this->data);*/

        return $this->view('dashboard.Correo.Correo');

    }

}