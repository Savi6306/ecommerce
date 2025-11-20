@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Forgot Password</h3>

                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('seller.forgotPassword.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-lg">Send Reset Link</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="{{ route('seller.login') }}">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
