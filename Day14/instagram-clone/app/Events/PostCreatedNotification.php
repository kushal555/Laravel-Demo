<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostCreatedNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mailContent = '';

    /**
     * Create a new event instance.
     *
     * @param $mailContent
     */
    public function __construct($mailContent)
    {
        $this->mailContent = $mailContent;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('post-created');
    }
}
