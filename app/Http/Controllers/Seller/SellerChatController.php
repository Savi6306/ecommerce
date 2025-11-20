<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Chat;
use App\Models\Admin\Message;
use App\Models\Admin\Admin;
use App\Events\MessageSent;


class SellerChatController extends Controller
{
    // List all admin chats
   public function index()
{
    $sellerId = auth()->id();

    // All started chats with admins
    $startedChats = Chat::where('seller_id', $sellerId)->with('admin')->get();

    // All admins
    $allAdmins = Admin::all();

    // Admins without a chat yet
    $adminsNotChatted = $allAdmins->filter(function($admin) use ($startedChats) {
        return !$startedChats->contains('admin_id', $admin->id);
    });

    return view('seller.chat.index', compact('startedChats','adminsNotChatted'));
}
public function startChat($adminId)
{
    $sellerId = auth()->id();

    // Create chat if it doesn't exist
    $chat = Chat::firstOrCreate([
        'seller_id' => $sellerId,
        'admin_id'  => $adminId
    ]);

    // Redirect to chat view
    return redirect()->route('seller.chat.admin.view', $adminId);
}

    // View chat with admin
    public function chatView($admin_id)
    {
        $sellerId = auth()->id();
        $chat = Chat::firstOrCreate([
            'seller_id' => $sellerId,
            'admin_id' => $admin_id
        ]);

        $messages = $chat->messages()->orderBy('created_at', 'asc')->get();

        return view('seller.chat.view', compact('chat','messages','admin_id'));
    }

    // Send message to admin
    public function sendMessage(Request $request, $chatId)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $message = Message::create([
            'chat_id' => $chatId,
            'sender_id' => auth()->id(),
            'sender_type' => 'seller',
            'message' => $request->message
        ]);

        // Optional: broadcast event for real-time updates
        broadcast(new MessageSent($message))->toOthers();

        return back();
    }

    // Optional: list all admins to start chat
    public function adminsList()
    {
        $admins = Admin::all();
        return view('seller.chat.admins_list', compact('admins'));
    }
}