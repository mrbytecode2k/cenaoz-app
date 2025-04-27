<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public  $mailData ; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  function  __construct ( $mailData )
    { 
       $this ->mailData = $mailData ; 
   } 
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public  function  envelope ( ): Envelope
    { 
       return  new  Envelope ( 
           subject: 'Certificacion Aprobada' , 
       ); 
   } 

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.mail' ,
            with: [
                'nombre' => $this ->mailData, 
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
