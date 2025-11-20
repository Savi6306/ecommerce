<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Chat;
use App\Models\Admin\Message;
use Illuminate\Http\Request;

class UserChatController extends Controller
{
    public function openChat($sellerId)
    {
        $userId = auth()->id();

        // Create chat row if not exists
        $chat = Chat::firstOrCreate([
            'user_id' => $userId,
            'seller_id' => $sellerId
        ]);

        $messages = $chat->messages()->orderBy('created_at')->get();

        return view('user.chat.chat_view', compact('chat','messages'));
    }

    public function sendMessage(Request $request, $chatId)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $msg = Message::create([
            'chat_id' => $chatId,
            'sender_id' => auth()->id(),
            'sender_type' => 'user',
            'message' => $request->message
        ]);

        // Optional real-time
        // broadcast(new MessageSent($msg))->toOthers();

        return back();
    }
}
