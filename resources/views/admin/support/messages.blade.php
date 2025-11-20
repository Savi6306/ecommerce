@extends('admin.layouts.app')
@section('title','Messages')

@section('content')
<div class="container-fluid mt-4">
    <h4>📨 Messages</h4>
    <a href="{{ route('admin.support.index') }}" class="btn btn-secondary mb-3">All Tickets</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Ticket Subject</th>
                <th>Status</th>
                <th>Submitted At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->subject }}</td>
                <td>
                    <span class="badge 
                        @if($ticket->status=='open') bg-success
                        @elseif($ticket->status=='pending') bg-warning
                        @else bg-secondary @endif">
                        {{ ucfirst($ticket->status) }}
                    </span>
                </td>
                <td>{{ $ticket->created_at->format('d M Y, h:i A') }}</td>
                <td>
                    <a href="{{ route('admin.support.show',$ticket->id) }}" class="btn btn-sm btn-primary mb-1">View</a>

                    {{-- Close button --}}
                    @if($ticket->status != 'closed')
                    <form action="{{ route('admin.support.close',$ticket->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger mb-1">Close</button>
                    </form>
                    @endif

                    {{-- Toggle Reply Form --}}
                    @if($ticket->status != 'closed')
                    <button class="btn btn-sm btn-success mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#replyForm{{ $ticket->id }}">Reply</button>

                    <div class="collapse mt-2" id="replyForm{{ $ticket->id }}">
                        <form action="{{ route('admin.support.reply',$ticket->id) }}" method="POST">
                            @csrf
                            <textarea name="reply" rows="3" class="form-control mb-2" placeholder="Type your reply..." required></textarea>
                            <button type="submit" class="btn btn-sm btn-success">Send</button>
                        </form>
                    </div>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center text-muted">No messages found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $tickets->links() }}
</div>
@endsection
