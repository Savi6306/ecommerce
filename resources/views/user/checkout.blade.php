@extends('layout.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm p-4">
        <h3 class="mb-4 text-center text-primary">Checkout</h3>

        <!-- Cart Items Summary -->
        <div class="mb-4">
            <h5 class="fw-bold mb-3">Order Summary</h5>
            @foreach($cartItems as $item)
                <div class="d-flex justify-content-between mb-1">
                    <div>{{ $item->product->name }} x {{ $item->quantity }}</div>
                    <div>₹{{ number_format($item->product->price * $item->quantity, 2) }}</div>
                </div>
            @endforeach
            <hr>
        </div>

        <!-- ✅ Checkout Form (fixed action) -->
        <form action="{{ route('checkout.placeOrder') }}" method="POST">
            @csrf

            <!-- Address Selection -->
            <div class="mb-4">
                <label class="form-label fw-bold">Select Address</label>

                @if($addresses->count() > 0)
                    <select name="address_id" class="form-select" required>
                        <option value="">-- Choose Address --</option>
                        @foreach($addresses as $address)
                            <option value="{{ $address->id }}">
                                {{ $address->name }}, {{ $address->address_line1 }}, {{ $address->city }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <div class="alert alert-warning d-flex justify-content-between align-items-center mt-2" role="alert">
                        <span>Please add your address first.</span>
                        <a href="{{ route('user.addresses') }}" class="btn btn-success">
                            ➕ Add Address
                        </a>
                    </div>
                @endif
            </div>

            <!-- Promo Code -->
            <hr>
            <div class="mb-3">
                <label for="promo_code" class="form-label">Apply your Coupon code if you have</label>
                <div class="d-flex align-items-center">
                    <input type="text" id="promo_code" class="form-control me-2" placeholder="Enter Promo Code">
                    <button type="button" id="apply-btn" class="btn btn-success" onclick="applyPromo()">
                        Apply
                        <span id="spinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>
                <p id="promo-message" class="mt-2"></p>
            </div>

            <!-- Total Amount -->
            <div class="mb-4">
                <label class="form-label fw-bold">Total Amount</label>
                <input type="number" id="total_amount" name="total" class="form-control fw-bold text-success"
                       value="{{ $total }}" readonly>
            </div>

            <!-- Final Total after Discount -->
            <div class="mb-4">
                <label class="form-label fw-bold">Total after Discount</label>
                <p class="fw-bold text-success fs-5">
                    ₹<span id="final-total">{{ number_format($total, 2, '.', '') }}</span>
                </p>
            </div>

            <!-- Place Order Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success">
                    Proceed to Payment
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function applyPromo() {
    let code = document.getElementById("promo_code").value;
    let total = parseFloat(document.getElementById("total_amount").value);
    let btn = document.getElementById("apply-btn");
    let spinner = document.getElementById("spinner");
    let msg = document.getElementById("promo-message");

    if (code.trim() === "") {
        msg.classList.remove("text-success");
        msg.classList.add("text-danger");
        msg.innerText = "Please enter a promo code!";
        return;
    }

    spinner.classList.remove("d-none");
    btn.disabled = true;
    msg.innerText = "";

    fetch("{{ route('apply.promo') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ code: code, total: total })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            msg.classList.remove("text-danger");
            msg.classList.add("text-success");
            msg.innerText = data.message;
            document.getElementById("final-total").innerText = parseFloat(data.final_total).toFixed(2);
            document.getElementById("total_amount").value = parseFloat(data.final_total).toFixed(2);
        } else {
            msg.classList.remove("text-success");
            msg.classList.add("text-danger");
            msg.innerText = data.message;
        }
    })
    .catch(err => {
        console.error(err);
        msg.classList.remove("text-success");
        msg.classList.add("text-danger");
        msg.innerText = "Something went wrong!";
    })
    .finally(() => {
        spinner.classList.add("d-none");
        btn.disabled = false;
    });
}
</script>

<style>
.card { border-radius: 15px; }
.form-label { font-size: 1.1rem; }
select.form-select, input.form-control { border-radius: 10px; padding: 0.5rem 1rem; }
button.btn-success { font-weight: bold; font-size: 1.1rem; }
#promo-message { font-weight: 500; }
</style>
@endsection
