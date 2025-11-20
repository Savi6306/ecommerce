@extends('admin.layouts.app')

@section('title','All Chats')

@section('content')
<h2>All Chats</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Seller</th>
            <th>Admin</th>
            <th>Chat Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($chats as $chat)
            <tr>
                <td>{{ $chat->id }}</td>
                <td>{{ $chat->user ? $chat->user->name : '-' }}</td>
                <td>{{ $chat->seller ? $chat->seller->name : '-' }}</td>
                <td>{{ $chat->admin ? $chat->admin->name : '-' }}</td>
                <td>{{ $chat->chat_type }}</td>
                <td>
                    <a href="{{ route('admin.chats.live_monitor', $chat->id) }}" class="btn btn-sm btn-primary">Monitor</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $chats->links('pagination::bootstrap-5') }}
</div>
@endsection
