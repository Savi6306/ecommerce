@extends('seller.layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📦 Featured Products</h2>

    <div class="accordion" id="featuredAccordion">
        @forelse($featuredProducts as $index => $product)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                        {{ $product->name }}
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#featuredAccordion">
                    <div class="accordion-body">
                        <p><strong>Price:</strong> ₹{{ $product->price }}</p>
                        <p><strong>Description:</strong> {{ $product->description }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No featured products available.</p>
        @endforelse
    </div>
</div>
@endsection
