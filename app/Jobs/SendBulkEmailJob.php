<?php

namespace App\Jobs;

use App\Mail\BatchMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBulkEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $emailContent = $this->data['body'];
        $subject = $this->data['header'];
        $emailList = $this->data['email'];
        $attachedFile = $this->data['attachment'];

        foreach ($emailList as $email) {
            Mail::to($email->email)->send(new BatchMail($emailContent, $subject, $attachedFile));
        }
    }
}
