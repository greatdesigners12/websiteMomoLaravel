<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StoreEmailSender extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $url;
    public $subject;

    public function __construct($subject, $id, $token)
    {
        $this->subject = $subject;
        if($this->subject == "Reset Password"){
            $this->url = "http://127.0.0.1:8000/resetPassword?" . "id=" . $id . "&" . "token=" .$token ;
        }else{
            $this->url = "http://127.0.0.1:8000/emailVerification?" . "id=" . $id . "&" . "token=" .$token ;
        }
        
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $view = 'email';

        if($this->subject == "Reset Password"){
            $view = 'emailResetPassword';
        }

        return new Content(
            view: $view
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
