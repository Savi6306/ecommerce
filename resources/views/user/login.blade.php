<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
        <link rel="icon" type="image/png" href="/images/PGMS Logo.png">

</head>
<body>
 @extends('layout.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    
                    {{-- Heading --}}
                    <h3 class="text-center mb-4 fw-bold text-teal">Login</h3>

                    {{-- Success/Error Messages --}}
                    @if(session('success'))
                        <div class="alert alert-success rounded-3">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger rounded-3">{{ session('error') }}</div>
                    @endif

                    {{-- Login Form --}}
                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control form-control-lg rounded-3 shadow-sm" required autofocus>
                            @error('email') 
                                <small class="text-danger">{{ $message }}</small> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" id="password" 
                                   class="form-control form-control-lg rounded-3 shadow-sm" required>
                            @error('password') 
                                <small class="text-danger">{{ $message }}</small> 
                            @enderror
                        </div>

                        <button type="submit" href="{{ route('profile.index') }}" class="btn btn-teal w-100 py-2 fw-bold rounded-3 shadow-sm">
                            Login
                        </button>
                    </form>

                    {{-- Forgot Password --}}
                    <div class="text-center mt-3">
                        <a href="{{ route('user.forgot') }}" class="text-decoration-none text-teal fw-semibold">
                            Forgot Password?
                        </a>
                    </div>

                    <hr class="my-4">

                    {{-- Registration Redirect --}}
                    <div class="text-center">
                        <p class="mb-1">Don’t have an account?</p>
                        <a href="{{ route('signup') }}" 
                           class="btn btn-outline-teal mt-2 w-100 py-2 fw-bold rounded-3 shadow-sm">
                            Create Account
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom Styling --}}
<style>
    .btn-teal {
        background-color: #008080;
        color: white;
        border: none;
    }
    .btn-teal:hover {
        background-color: #006666;
        color: white;
    }
    .btn-outline-teal {
        border: 2px solid #008080;
        color: #008080;
    }
    .btn-outline-teal:hover {
        background-color: #008080;
        color: white;
    }
    .text-teal {
        color: #008080;
    }
</style>
@endsection

</body>
</html>