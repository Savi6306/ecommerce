<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SupportTicket;
use App\Models\Admin\SupportTicketMessage;

class SupportController extends Controller
{
    // List all tickets
    public function index()
    {
        $tickets = SupportTicket::latest()->paginate(15);
        return view('admin.support.index', compact('tickets'));
    }
    
    // Inbox (Open / Pending tickets)
    public function inbox()
    {
        $tickets = SupportTicket::whereIn('status', ['open','pending'])->latest()->paginate(15);
        return view('admin.support.inbox', compact('tickets'));
    }

    // Show create ticket form
    public function create()
    {
        return view('admin.support.create');
    }

    // Store ticket
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        SupportTicket::create([
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'open',
        ]);

        return redirect()->route('admin.support.index')->with('success', 'Support ticket created successfully.');
    }

    // Show single ticket details
    public function show(SupportTicket $ticket)
    {
        return view('admin.support.show', compact('ticket'));
    }

    // Messages page (Admin view)
    public function messages()
    {
        // फिलहाल हम support tickets messages दिखा रहे हैं
        // Future में अलग table बनाकर अलग logic use कर सकते हैं
        $tickets = SupportTicket::latest()->paginate(15);
        return view('admin.support.messages', compact('tickets'));
    }

    // Mark ticket as closed
    public function close(SupportTicket $ticket)
    {
        $ticket->update(['status' => 'closed']);
        return back()->with('success', 'Ticket closed successfully.');
    }
/// Reply to ticket
public function reply(Request $request, SupportTicket $ticket)
{
    $request->validate([
        'reply' => 'required|string'
    ]);

    // Safe username fallback
    $adminName = $request->user() ? $request->user()->name : 'Admin';

    // Create reply
    $reply = "\n\nAdmin Reply ({$adminName}): " . $request->reply;

    // Update ticket message
    $ticket->update([
        'message' => $ticket->message . $reply
    ]);

    return back()->with('success', 'Reply sent successfully.');
}

}
