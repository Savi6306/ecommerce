  @extends('layouts.app')

@section('content')
  @include('layouts.navbar')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height:90vh; background:#f5f5f5;">
    <div class="card p-4 shadow-sm" style="width:400px; border-radius:12px;">
        <h4 class="text-center mb-4">PGMS Supplier Login</h4>

        {{-- Show errors --}}
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Login form: Email + Password only --}}
        <form method="POST" action="{{ route('seller.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="text-center">
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
                    Forgot Password?
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Forgot Password Modal --}}
<div class="modal fade" id="forgotPasswordModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5>Reset Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="forgotPasswordForm">
          @csrf
          <div class="mb-3">
            <label>Email</label>
            <input type="email" id="forgotEmail" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>OTP</label>
            <input type="text" id="forgotOtp" name="otp" class="form-control" placeholder="Enter OTP" required>
          </div>
          <div class="mb-3">
            <label>New Password</label>
            <input type="password" id="forgotPassword" name="password" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" id="forgotPasswordConfirmation" name="password_confirmation" class="form-control" required>
          </div>
          <div class="d-grid mb-2">
            <button type="button" id="forgotSendOtpBtn" class="btn btn-outline-primary">Send OTP</button>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Reset Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){

    function validateEmail(email){
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Forgot password OTP
    $('#forgotSendOtpBtn').click(function(){
        let email = $('#forgotEmail').val().trim();
        if(!validateEmail(email)){ alert('Enter a valid email'); return; }

        $.post('{{ route("seller.forgotPassword.sendOtp") }}', {_token:'{{ csrf_token() }}', email:email})
         .done(res => alert(res.message || 'OTP sent successfully!'))
         .fail(err => alert(err.responseJSON?.message || 'Failed'));
    });

    // Forgot password reset
    $('#forgotPasswordForm').submit(function(e){
        e.preventDefault();
        $.post('{{ route("seller.forgotPassword.reset") }}', $(this).serialize())
         .done(res => alert(res.message || 'Password reset successfully!'))
         .fail(err => alert(err.responseJSON?.message || 'Failed'));
    });

});
</script>
@include('layouts.footer')
@endsection
