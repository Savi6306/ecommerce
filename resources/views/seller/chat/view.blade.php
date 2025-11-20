@extends('seller.layouts.app')

@section('title', 'Chat with ' . $chat->admin->name)

@section('content')
<h2>Chat with {{ $chat->admin->name }}</h2>

<div id="chat-box" style="border:1px solid #ccc; padding:10px; height:400px; overflow-y:scroll; background:#f9f9f9;">
    @foreach($messages as $message)
        @if($message->sender_type === 'seller')
            <div style="text-align:right; margin-bottom:8px;">
                <span style="background:#d1e7dd; padding:5px 10px; border-radius:10px; display:inline-block;">
                    You: {{ $message->message }}
                </span>
            </div>
        @else
            <div style="text-align:left; margin-bottom:8px;">
                <span style="background:#f8d7da; padding:5px 10px; border-radius:10px; display:inline-block;">
                    {{ $chat->admin->name }}: {{ $message->message }}
                </span>
            </div>
        @endif
    @endforeach
</div>

<form action="{{ route('seller.chat.admin.send', $chat->id) }}" method="POST" style="margin-top:10px; display:flex; gap:5px;">
    @csrf
    <input type="text" name="message" placeholder="Type your message" required style="flex:1; padding:5px;">
    <button type="submit" class="btn btn-primary">Send</button>
</form>

<script>
// Auto scroll to bottom
var chatBox = document.getElementById('chat-box');
chatBox.scrollTop = chatBox.scrollHeight;
</script>
@endsection
