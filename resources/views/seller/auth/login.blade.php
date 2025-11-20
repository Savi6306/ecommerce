@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Seller Login</h3>

                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('seller.login.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="{{ route('seller.forgotPassword') }}">Forgot Password?</a>
                    </div>

                    <div class="mt-3 text-center">
                        <span>New to PGMS? </span>
                        <a href="{{ route('seller.startSelling') }}" class="fw-bold text-decoration-none">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
