<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Chat;
use App\Models\Admin\Message;
use App\Events\MessageSent;

class ChatController extends Controller
{
    // Show chat between user and seller
    public function userChat($sellerId)
    {
        $userId = auth()->id();
        $chat = Chat::firstOrCreate([
            'user_id' => $userId,
            'seller_id' => $sellerId
        ]);

        $messages = $chat->messages()->latest()->get();
        return view('chat.user_chat', compact('chat','messages'));
    }

    // Send message
    public function sendMessage(Request $request, $chatId)
    {
        $message = Message::create([
            'chat_id' => $chatId,
            'sender_id' => auth()->id(),
            'sender_type' => 'user',
            'message' => $request->message
        ]);

        broadcast(new MessageSent($message))->toOthers();
        return response()->json($message);
    }
}
