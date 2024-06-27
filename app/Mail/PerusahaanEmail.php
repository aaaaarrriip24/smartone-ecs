<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class PerusahaanEmail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $perusahaan;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($perusahaan)
    {
        $this->perusahaan = $perusahaan;
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
}