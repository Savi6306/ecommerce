<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'chat_id', 'sender_id', 'sender_type', 'message', 'is_read', 'read_at'
    ];

    public function chat() {
        return $this->belongsTo(Chat::class);
    }
}
