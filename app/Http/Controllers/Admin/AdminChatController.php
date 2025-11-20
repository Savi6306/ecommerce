<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Chat;
use App\Models\Admin\Message;
use App\Events\MessageSent;

class AdminChatController extends Controller
{
    // List all chats
    public function index()
    {
        $chats = Chat::with(['user', 'seller', 'admin'])->latest()->paginate(15);
        return view('admin.chats.index', compact('chats'));
    }

    // Live monitor chat
    public function viewChat($chatId)
    {
        $chat = Chat::with('messages')->findOrFail($chatId);
        return view('admin.chats.view', compact('chat'));
    }

    // Send message from Admin
    public function sendMessage(Request $request, $chatId)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $chat = Chat::findOrFail($chatId);

        $message = Message::create([
            'chat_id' => $chatId,
            'sender_id' => auth()->guard('admin')->id(),
            'sender_type' => 'admin',
            'message' => $request->message
        ]);

        // Broadcast event if using real-time updates
        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'message' => $message->message,
            'created_at' => $message->created_at
        ]);
    }
}
