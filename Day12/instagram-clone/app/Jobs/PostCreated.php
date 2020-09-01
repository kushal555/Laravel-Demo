<?php

namespace App\Jobs;

use App\Mail\PostCreatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class PostCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mailContent;

    /**
     * Create a new job instance.
     *
     * @param $mailContent
     */
    public function __construct($mailContent)
    {
        $this->mailContent = $mailContent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mailContent->follower)->send(new PostCreatedNotification($this->mailContent));
    }
}
