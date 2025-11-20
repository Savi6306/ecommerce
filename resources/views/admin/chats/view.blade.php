@extends('admin.layouts.app')

@section('title', 'Live Chat Monitor')

@section('content')
<h2>Live Chat Monitor - Chat ID: {{ $chat->id }}</h2>

<div class="chat-box" style="border:1px solid #ccc; padding:10px; height:400px; overflow-y:scroll; margin-bottom:15px;">
    @foreach($chat->messages as $msg)
        <div style="margin-bottom:8px; text-align: {{ $msg->sender_type == 'admin' ? 'right' : 'left' }};">
            <strong>{{ ucfirst($msg->sender_type) }}:</strong> {{ $msg->message }}
            <br>
            <small>{{ $msg->created_at->format('H:i') }}</small>
        </div>
    @endforeach
</div>

<form action="{{ route('admin.chats.send', $chat->id) }}" method="POST" id="chatForm">
    @csrf
    <div class="input-group">
        <input type="text" name="message" class="form-control" placeholder="Type your reply..." required>
        <button type="submit" class="btn btn-primary">Send</button>
    </div>
</form>
@endsection

@push('scripts')
<script>
const chatBox = document.querySelector('.chat-box');
if(chatBox) chatBox.scrollTop = chatBox.scrollHeight;

const form = document.getElementById('chatForm');
form.addEventListener('submit', function(e){
    e.preventDefault();
    const url = form.action;
    const formData = new FormData(form);

    fetch(url, {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        const div = document.createElement('div');
        div.style.textAlign = 'right';
        div.style.marginBottom = '8px';
        div.innerHTML = `<strong>Admin:</strong> ${data.message} <br><small>${new Date(data.created_at).toLocaleTimeString()}</small>`;
        chatBox.appendChild(div);
        chatBox.scrollTop = chatBox.scrollHeight;
        form.reset();
    });
});
</script>
@endpush
