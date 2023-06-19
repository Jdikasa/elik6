<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendCotationEmail extends Mailable
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
        $team = Auth::user()->currentTeam;
        $teamInfo = $team->teamInfo;
        return $this->subject($this->subject)
                    ->from($teamInfo->email, $team->name)
                    ->replyTo($teamInfo->email, $team->name)
                    ->attachFromStorage($this->pdfFilePath,'facture.pdf',[
                        'mime' => 'application/pdf',
                    ])
                    ->markdown('emails.cotations.client');
    }
}
