@extends('seller.layouts.app')

@section('content')
<div class="container">
    <h3>Chat with Admin</h3>
    <div class="card">
        <div class="card-body">
            <div id="messages" style="height:300px; overflow-y:auto;">
                @foreach($messages as $msg)
                    <div class="mb-2 {{ $msg->sender_type == 'seller' ? 'text-end' : 'text-start' }}">
                        <span class="badge bg-{{ $msg->sender_type == 'seller' ? 'success' : 'dark' }}">
                            {{ ucfirst($msg->sender_type) }}
                        </span>
                        <span>{{ $msg->message }}</span>
                    </div>
                @endforeach
            </div>

            <form id="chatForm" class="mt-3">
                <input type="hidden" name="chat_id" value="{{ $chat->id }}">
                <input type="hidden" name="sender_id" value="{{ auth('seller')->id() }}">
                <input type="hidden" name="sender_type" value="seller">
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Type a message...">
                    <button type="submit" class="btn btn-success">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('chatForm').addEventListener('submit', async function(e){
    e.preventDefault();
    const form = this;
    const res = await fetch('{{ route("message.store") }}', {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}','Content-Type': 'application/json'},
        body: JSON.stringify({
            chat_id: form.chat_id.value,
            sender_id: form.sender_id.value,
            sender_type: form.sender_type.value,
            message: form.message.value
        })
    });
    form.message.value = '';
    location.reload();
});
</script>
@endsection
