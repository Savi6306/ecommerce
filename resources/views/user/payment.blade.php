@extends('layout.app')

@section('content')
<div class="container my-5">
    <div class="card p-4 shadow-sm mx-auto" style="max-width: 600px; border-radius: 15px;">
        <h3 class="mb-4 text-center text-primary">Complete Your Payment</h3>

        <p class="fw-bold fs-5 text-center">
            Total Amount: <span class="text-success">₹{{ number_format($final_total, 2) }}</span>
        </p>

        <form action="{{ route('payment.process') }}" method="POST" id="paymentForm">
            @csrf

            <!-- ✅ Pass amount and order_id to backend -->
            <input type="hidden" name="amount" value="{{ $final_total }}">
            <input type="hidden" name="order_id" value="{{ $orderId ?? session('checkout_order_id') }}">

            <!-- Payment Methods -->
            <div class="mb-3">
                <label class="form-label fw-bold">Select Payment Method</label>
                <div class="d-flex flex-column gap-2">
                    <label>
                        <input type="radio" name="method" value="COD" class="method-radio"> Cash on Delivery
                    </label>
                    <label>
                        <input type="radio" name="method" value="UPI" class="method-radio"> UPI
                    </label>
                    <label>
                        <input type="radio" name="method" value="Card" class="method-radio"> Credit/Debit Card
                    </label>
                    <label>
                        <input type="radio" name="method" value="NetBanking" class="method-radio"> Net Banking
                    </label>
                </div>
            </div>

            <!-- Payment Details -->
            <div class="mb-3 d-none" id="detailsBox">
                <label class="form-label fw-bold" id="detailsLabel">Payment Details</label>
                <input type="text" class="form-control" name="details" id="detailsInput" placeholder="">
            </div>

            <!-- Submit -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success fw-bold">Pay Now</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const radios = document.querySelectorAll('.method-radio');
    const detailsBox = document.getElementById('detailsBox');
    const detailsInput = document.getElementById('detailsInput');
    const form = document.getElementById('paymentForm');

    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'COD') {
                detailsBox.classList.add('d-none');
                detailsInput.value = 'Cash on Delivery';
            } else {
                detailsBox.classList.remove('d-none');
                detailsInput.value = '';
                if (radio.value === 'UPI') detailsInput.placeholder = 'Enter UPI ID (e.g. name@bank)';
                if (radio.value === 'Card') detailsInput.placeholder = 'Enter Card Number';
                if (radio.value === 'NetBanking') detailsInput.placeholder = 'Enter Bank Name';
            }
        });
    });

    // Ensure payment method is selected
    form.addEventListener('submit', function(event) {
        const selectedMethod = document.querySelector('input[name="method"]:checked');
        if (!selectedMethod) {
            alert('⚠️ Please select a payment method before continuing.');
            event.preventDefault();
        }
    });
});
</script>

<style>
body { background-color: #f8f9fa; }
.card { border-radius: 15px; }
.form-label { font-weight: 600; }
.method-radio { margin-right: 0.5rem; }
select.form-select, input.form-control { border-radius: 10px; padding: 0.5rem 1rem; }
button.btn-success { font-size: 1.1rem; padding: 0.5rem 1rem; border-radius: 10px; }
</style>
@endsection
