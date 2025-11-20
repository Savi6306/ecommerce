@extends('seller.layouts.app')

@section('title', 'Chat with User')

@section('content')

<h2>Chat with User #{{ $userId }}</h2>

<div style="height:400px; overflow-y:scroll; padding:10px; background:#fafafa;">
    @foreach($messages as $msg)
        @if($msg->sender_type == 'seller')
            <div style="text-align:right; margin-bottom:10px;">
                <span style="padding:8px 12px; background:#d1e7dd; border-radius:10px;">
                    You: {{ $msg->message }}
                </span>
            </div>
        @else
            <div style="text-align:left; margin-bottom:10px;">
                <span style="padding:8px 12px; background:#f8d7da; border-radius:10px;">
                    User: {{ $msg->message }}
                </span>
            </div>
        @endif
    @endforeach
</div>

<form method="POST" action="{{ route('seller.chat.user.send', $chat->id) }}" class="mt-3">
    @csrf
    <div class="input-group">
        <input type="text" name="message" class="form-control" required placeholder="Type a message...">
        <button class="btn btn-primary">Send</button>
    </div>
</form>

@endsection
