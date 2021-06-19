<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class MailBase
 *
 * @package App\Mail
 */
class MailBase extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    protected $mailData;

    /**
     * Create a new message instance.
     *
     * @param array $mailData
     *
     * @return void
     */
    public function __construct(Array $mailData = null)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(isset($this->mailData['from']) && !empty($this->mailData['from'])) {
            $this->from($this->mailData['from']['address'],$this->mailData['from']['name']);
        } else {
            throw new \Exception('Falta una dirección de correo como remitente (from:)');
        }
        if(isset($this->mailData['subject']) && !empty($this->mailData['subject'])) {
            $this->subject($this->mailData['subject']);
        }  else {
            throw new \Exception('Falta una descripción del mensaje, campo asunto mo puede estar vacio (subject:)');
        }
        if(isset($this->mailData['view']) && !empty($this->mailData['view'])) {
            $this->view($this->mailData['view']);  // Html view
        }
        if(isset($this->mailData['params']) && !empty($this->mailData['params'])) {
            $this->with($this->mailData['params']);
        }
        if(isset($this->mailData['attach']) && !empty($this->mailData['attach'])) {
            $this->attach($this->mailData['attach']['file'],$this->mailData['attach']['mimeType']);
        }
        return $this;

//        return $this->from($this->mailData['from']['address'],$this->mailData['from']['name'])
//            ->subject($this->mailData['subject'])
//            ->view($this->mailData['view'])  // Html view or
//            //->text($this->mailData['text']) // Text View
//            ->with($this->mailData['params'])
//            ->attach(isset($this->mailData['attach']) ? $this->mailData['attach']['file'] : [], isset($this->mailData['attach']) ? $this->mailData['attach']['mimeType'] : []);
    }
}
