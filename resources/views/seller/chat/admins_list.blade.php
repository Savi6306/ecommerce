<!-- List all chats -->
@foreach($chats as $chat)
    <a href="{{ route('seller.chat.admin.view', $chat->admin->id) }}">
        {{ $chat->admin->name }}
    </a>
@endforeach
