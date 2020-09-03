<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreatedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $mailContent;

    /**
     * Create a new message instance.
     *
     * @param $mailContent
     */
    public function __construct($mailContent)
    {
        $this->mailContent = $mailContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.post-created-notification');
    }
}
