<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;

class UserTyping implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $chat_id;
    public $sender_type;

    public function __construct($chat_id, $sender_type)
    {
        $this->chat_id = $chat_id;
        $this->sender_type = $sender_type;
    }

    public function broadcastOn()
    {
        return new Channel('chat.' . $this->chat_id);
    }
}
