@foreach($products as $product)
<div class="col-md-3 mb-4">
  <div class="card h-100 shadow-sm">
    <img src="{{ asset(str_replace('public/', '', $product->image)) }}" class="card-img-top" alt="{{ $product->name }}">
    <div class="card-body text-center">
      <h5 class="fw-bold">{{ $product->name }}</h5>
      <p class="text-muted">{{ $product->description }}</p>
      <h6>₹{{ $product->price }}</h6>
      <a href="{{ route('cart.add', $product->id) }}" class="btn btn-sm btn-primary">Add to Cart</a>
      <a href="{{ url('/buy-now/'.$product->id) }}" class="btn btn-success btn-sm">Buy Now</a>
    </div>
  </div>
</div>
@endforeach
