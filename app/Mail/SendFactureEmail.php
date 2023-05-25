<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFactureEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfFilePath;
    public $subject;
    public $textmessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdfFilePath, $subject, $textmessage)
    {
        $this->pdfFilePath = $pdfFilePath;
        $this->subject = $subject;
        $this->textmessage = $textmessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->attachFromStorage($this->pdfFilePath,'facture.pdf',[
                        'mime' => 'application/pdf',
                    ])
                    ->markdown('emails.factures.client');
    }
}
