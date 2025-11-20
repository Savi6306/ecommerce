<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Chat;
use App\Models\Admin\Message;
use App\Models\User;

class SellerUserChatController extends Controller
{
    // Show list of all users who chatted with this seller
    public function index()
    {
        $sellerId = auth()->id();

        // Fetch chats where a user exists
        $userChats = Chat::where('seller_id', $sellerId)
                        ->whereNotNull('user_id')
                        ->with('user')
                        ->get();

        return view('seller.chat.user_list', compact('userChats'));
    }

    // Open chat with a specific user
    public function chatWithUser($userId)
    {
        $sellerId = auth()->id();

        // Create chat if not exist
        $chat = Chat::firstOrCreate([
            'seller_id' => $sellerId,
            'user_id'   => $userId
        ]);

        $messages = $chat->messages()->orderBy('created_at')->get();

        return view('seller.chat.user_chat', compact('chat', 'messages', 'userId'));
    }

    // Send message to the user
    public function sendMessage(Request $request, $chatId)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $message = Message::create([
            'chat_id'     => $chatId,
            'sender_id'   => auth()->id(),
            'sender_type' => 'seller',
            'message'     => $request->message
        ]);

        return back();
    }
}
