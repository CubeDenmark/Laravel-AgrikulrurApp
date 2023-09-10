<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlaygroundEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

     public $testmessage;
     public $user;
    public function __construct($testmessage, $user)
    {
        $this->testmessage = $testmessage;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastAs(): string
    {
        return 'chat-message';
    }
    public function broadcastWith(): array
    {
        return [
            'message' => $this->testmessage,
            'user' => $this->user->only(['name', 'email']),
        ];
    }
    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('pressence.chat.1'),
        ];
    }
}

