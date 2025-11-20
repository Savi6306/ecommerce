@extends('admin.layouts.app')
@section('title','Ticket Details')

@section('content')
<div class="container mt-4">
    <h4>Ticket #{{ $ticket->id }} - {{ $ticket->subject }}</h4>
    <p>Status: 
        <span class="badge 
            @if($ticket->status=='open') bg-success
            @elseif($ticket->status=='pending') bg-warning
            @else bg-secondary @endif">{{ ucfirst($ticket->status) }}</span>
    </p>
    <p>Submitted By: {{ $ticket->user?->name ?? 'Guest' }} ({{ $ticket->created_at->format('d M Y, h:i A') }})</p>
    <hr>

    <h5>Conversation</h5>
    <div class="mb-3 p-3 border rounded bg-light">
        {!! nl2br(e($ticket->message)) !!}
    </div>

    @if($ticket->status!='closed')
    <hr>
    <h5>Reply</h5>
    <form action="{{ route('admin.support.reply',$ticket->id) }}" method="POST">
        @csrf
        <textarea name="reply" rows="4" class="form-control mb-2" placeholder="Type your reply..." required></textarea>
        <button type="submit" class="btn btn-success">Send Reply</button>
    </form>
    @endif
</div>
@endsection
