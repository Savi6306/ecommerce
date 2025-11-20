@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row g-5">

        <!-- Left Side - Signup Form -->
        <div class="col-md-6">
            <!-- Logo & Welcome -->
            <div class="mb-4 text-center">
                <img src="{{ asset('images/logo.png') }}" alt="PGMS Logo" class="mb-3" style="height: 60px;">
                <h2 class="fw-bold">Welcome to PGMS</h2>
                <p class="text-muted">Create your account to start selling</p>
            </div>

            <!-- Display Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Signup Form -->
            <form method="POST" action="{{ route('seller.startSelling.submit') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" 
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Enter your full name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email + OTP -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <input type="email" id="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Enter your email"
                               value="{{ old('email') }}" required>
                        <button type="button" id="sendOtpBtn" class="btn btn-outline-primary">Send OTP</button>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- OTP -->
                <div class="mb-3">
                    <label for="otp" class="form-label">Enter OTP</label>
                    <input type="text" id="otp" name="otp" 
                           class="form-control @error('otp') is-invalid @enderror"
                           placeholder="Enter OTP" required>
                    @error('otp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mobile -->
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="text" id="mobile" name="mobile" 
                           class="form-control @error('mobile') is-invalid @enderror"
                           placeholder="Enter your mobile number" value="{{ old('mobile') }}" required>
                    @error('mobile')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" 
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Create a password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                           class="form-control @error('password_confirmation') is-invalid @enderror"
                           placeholder="Confirm your password" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- WhatsApp Updates -->
                <div class="mb-3 form-check">
                    <input type="checkbox" id="whatsapp" name="whatsapp" class="form-check-input" value="1" {{ old('whatsapp') ? 'checked' : '' }}>
                    <label for="whatsapp" class="form-check-label">
                        I want to receive important updates on <span class="fw-bold">WhatsApp</span>
                    </label>
                </div>

                <!-- Terms -->
                <p class="small text-muted">
                    By clicking you agree to our 
                    <a href="#" class="text-decoration-none">Terms & Conditions</a> and 
                    <a href="#" class="text-decoration-none">Privacy Policy</a>.
                </p>

                <!-- Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary fw-bold py-2">Create Account</button>
                </div>
            </form>

            <!-- Already a user -->
            <div class="mt-3 text-center">
                <span>Already a user? </span>
                <a href="{{ route('seller.login') }}" class="fw-bold text-decoration-none">Login</a>
            </div>
        </div>

        <!-- Right Side - PGMS Highlights -->
        <div class="col-md-6">
            <h4 class="fw-bold mb-3">Grow your business faster by selling on PGMS</h4>
            <div class="row g-3 mb-4">
                <div class="col-6">
                    <div class="p-3 bg-light rounded shadow-sm text-center">
                        <h5 class="fw-bold">11 lakh+</h5>
                        <p class="small mb-0">Suppliers selling commission-free</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 bg-light rounded shadow-sm text-center">
                        <h5 class="fw-bold">19000+</h5>
                        <p class="small mb-0">Pincodes supported for delivery</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 bg-light rounded shadow-sm text-center">
                        <h5 class="fw-bold">Crores</h5>
                        <p class="small mb-0">Customers buy across India</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 bg-light rounded shadow-sm text-center">
                        <h5 class="fw-bold">700+</h5>
                        <p class="small mb-0">Categories to sell</p>
                    </div>
                </div>
            </div>

            <h5 class="fw-bold">All you need to sell on PGMS is:</h5>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><span class="fw-bold">Tax Details</span><br>Enrolment ID/UIN (For Non-GST sellers)</li>
                <li class="list-group-item"><span class="fw-bold">GSTIN</span><br>Regular & Composition GST sellers</li>
                <li class="list-group-item"><span class="fw-bold">Bank Account</span></li>
            </ul>
        </div>
    </div>
</div>

<!-- Email OTP Script -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sendOtpBtn = document.getElementById('sendOtpBtn');
    const emailInput = document.getElementById('email');

    sendOtpBtn.addEventListener('click', function() {
        const email = emailInput.value.trim();

        if (!email || !email.includes('@')) {
            alert('Please enter a valid email address');
            return;
        }

        sendOtpBtn.disabled = true;
        sendOtpBtn.textContent = 'Sending...';
// ✅ CSRF token fetch
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('{{ route("seller.send.email.otp") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => { 
                    throw new Error(data.message || 'Server error'); 
                });
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
            let countdown = 60;
            sendOtpBtn.textContent = `Resend in ${countdown}s`;
            const interval = setInterval(() => {
                countdown--;
                if (countdown > 0) {
                    sendOtpBtn.textContent = `Resend in ${countdown}s`;
                } else {
                    clearInterval(interval);
                    sendOtpBtn.textContent = 'Send OTP';
                    sendOtpBtn.disabled = false;
                }
            }, 1000);
        })
        .catch(err => {
            console.error(err);
            alert(err.message || 'Something went wrong. Please try again.');
            sendOtpBtn.disabled = false;
            sendOtpBtn.textContent = 'Send OTP';
        });
    });
});
</script>

@endsection
