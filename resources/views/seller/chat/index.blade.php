@extends('seller.layouts.app')

@section('title', 'Admin Chats') <!-- optional page title -->

@section('content')

<h2>Admin Chats</h2>

<h3>Ongoing Chats</h3>
@if($startedChats->count() > 0)
    <ul>
    @foreach($startedChats as $chat)
        @if($chat->admin)
            <li>
                <a href="{{ route('seller.chat.admin.view', $chat->admin->id) }}">
                    {{ $chat->admin->name }}
                </a>
            </li>
        @endif
    @endforeach
    </ul>
@else
    <p>No chats started yet.</p>
@endif

<hr>

<h3>Admins to Start Chat</h3>
@if($adminsNotChatted->count() > 0)
    <ul>
    @foreach($adminsNotChatted as $admin)
        <li>
            <a href="{{ route('seller.chat.admin.start', $admin->id) }}">
                {{ $admin->name }}
            </a>
        </li>
    @endforeach
    </ul>
@else
    <p>All admins already have chats.</p>
@endif

@endsection
