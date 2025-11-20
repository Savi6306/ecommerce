@extends('seller.layouts.app')

@section('content')
<div class="container">
    <h4>Chat with User #{{ $chat->user_id }}</h4>

    <div id="chat-box" style="height:400px; overflow-y:auto; border:1px solid #ccc; padding:10px;"></div>
    <small id="typing-status" class="text-muted"></small>

    <div class="input-group mt-2">
        <input type="text" id="message" class="form-control" placeholder="Type message...">
        <button id="send-btn" class="btn btn-success">Send</button>
    </div>
</div>

<script src="https://js.pusher.com/8.2/pusher.min.js"></script>
<script>
Pusher.logToConsole = false;

var chat_id = {{ $chat->id }};
var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
    cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}'
});
var channel = pusher.subscribe('chat.' + chat_id);

function loadMessages() {
    fetch('/messages/' + chat_id)
        .then(res => res.json())
        .then(messages => {
            $('#chat-box').html('');
            messages.forEach(msg => {
                let who = msg.sender_type == 'seller' ? '🏪You' : '🧍User';
                $('#chat-box').append('<p><b>' + who + ':</b> ' + msg.message + '</p>');
            });
        });
}
loadMessages();

channel.bind('App\\Events\\MessageSent', function(data) {
    if (data.message.chat_id == chat_id) {
        let who = data.message.sender_type == 'seller' ? '🏪You' : '🧍User';
        $('#chat-box').append('<p><b>' + who + ':</b> ' + data.message.message + '</p>');
        markAsRead();
    }
});

$('#send-btn').click(function() {
    $.post('{{ route("message.store") }}', {
        chat_id: chat_id,
        sender_type: 'seller',
        message: $('#message').val(),
        _token: '{{ csrf_token() }}'
    });
    $('#message').val('');
});

function markAsRead() {
    $.post('{{ route("messages.read") }}', {
        chat_id: chat_id,
        reader_type: 'seller',
        _token: '{{ csrf_token() }}'
    });
}

$('#message').on('input', function() {
    $.post('{{ route("typing") }}', {
        chat_id: chat_id,
        sender_type: 'seller',
        _token: '{{ csrf_token() }}'
    });
});

channel.bind('App\\Events\\UserTyping', function(data) {
    if (data.chat_id == chat_id && data.sender_type != 'seller') {
        $('#typing-status').text('User is typing...');
        setTimeout(() => $('#typing-status').text(''), 2000);
    }
});
</script>
@endsection
