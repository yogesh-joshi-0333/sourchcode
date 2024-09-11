<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExceptionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $error; // Property to hold the data

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct($error)
    {
        $this->error = $error;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.error')
        ->subject('Mariner Museum Error Report - Alert!')
        ->with('error', $this->error); // Pass data to the view
    }
}
