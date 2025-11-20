@extends('seller.layouts.app')

@section('title', 'User Chats')

@section('content')
<h2>User Chats</h2>

@if($userChats->count())
<ul class="list-group">
    @foreach($userChats as $chat)
        <li class="list-group-item">
            <a href="{{ route('seller.chat.user', $chat->user_id) }}">
                {{ $chat->user->name ?? 'User #'.$chat->user_id }}
            </a>
        </li>
    @endforeach
</ul>
@else
<p>No user chats yet.</p>
@endif

@endsection
