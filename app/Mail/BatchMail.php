<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class BatchMail extends Mailable
{
    use Queueable, SerializesModels;

    public $dataPT;

    /**
     * Create a new message instance.
     */
    public function __construct($dataPT)
    {
        $this->dataPT = $dataPT;
    }

    public function build()
    {
        return $this->subject($this->dataPT['header_email'])
        ->view('email.bulks')
        ->with([
            'nama_perusahaan' => $this->dataPT['nama_perusahaan'],
            'email' => $this->dataPT['email'],
            'body_email' => $this->dataPT['body_email'],
        ]);
    }
    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope($this->subject);
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content($this->content);
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // return [
        //     Attachment::fromPath($this->dataPT->attachment),
        // ];
        return [
            Attachment::fromPath($this->dataPT['attachment'])
        ];
    }
}
