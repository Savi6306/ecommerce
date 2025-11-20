@if($cart)
    @foreach($cart as $seller_id => $items)
        <div class="card mb-2">
            <div class="card-header">
                Seller: {{ \App\Models\Seller::find($seller_id)->name ?? 'N/A' }}
            </div>
            <ul class="list-group list-group-flush">
                @foreach($items as $product_id => $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $item['name'] }} ({{ $item['quantity'] }}) - ₹{{ $item['price'] * $item['quantity'] }}
                        <form action="{{ route('admin.pos.remove', [$seller_id, $product_id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach

    {{-- Checkout button --}}
    <form action="{{ route('admin.pos.checkout') }}" method="POST">
        @csrf
        <button class="btn btn-success mt-3">Checkout All</button>
    </form>
@else
    <p>No items in cart</p>
@endif
