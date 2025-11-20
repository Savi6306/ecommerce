@extends('admin.layouts.app')
@section('title','All Tickets')

@section('content')
<div class="container-fluid mt-4">
    <h4>All Support Tickets</h4>
    <a href="{{ route('admin.support.create') }}" class="btn btn-success mb-3">+ Create Ticket</a>
    <a href="{{ route('admin.support.inbox') }}" class="btn btn-primary mb-3">📥 Inbox</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Submitted By</th>
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
                <td>{{ $ticket->user?->name ?? 'Guest' }}</td>
                <td>
                    <a href="{{ route('admin.support.show',$ticket->id) }}" class="btn btn-sm btn-primary">View</a>
                    @if($ticket->status!='closed')
                    <form action="{{ route('admin.support.close',$ticket->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Close</button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">No tickets found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $tickets->links() }}
</div>
@endsection
