<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;  

class PerusahaanEmail extends Mailable
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
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from ExportCenter.id')->view('email.email');
    }
    
    public function attachments($dataPT): array
    {
        return [
            Attachment::fromPath($this->attachedFile),
        ];
    }
}