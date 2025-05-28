<?php

namespace Pm\ContactForm\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Nieuw contactformulier')
            ->from(config('contactform.recipient_email'), $this->data['name'])
            ->replyTo($this->data['email'], $this->data['name'])
            ->view('contactform::emails.contact-submitted');
    }
}
