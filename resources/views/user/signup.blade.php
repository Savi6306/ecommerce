<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" type="image/png" href="/images/PGMS Logo.png">
</head>
<body>
@extends('layout.app')

@section('title', 'Sign Up')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4 fw-bold text-teal">Create Your Account</h3>

                    {{-- Success / Error Messages --}}
                    @if(session('success'))
                        <div class="alert alert-success rounded-3">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Sign Up Form --}}
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <!-- Row 1: Full Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="full_name" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Enter your full name" required>
                        </div>

                        <!-- Row 2: Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Enter your email" required>
                        </div>

                        <!-- Row 3: Gender + Phone -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Gender</label>
                                <select name="gender" class="form-select form-control-lg rounded-3 shadow-sm" required>
                                    <option value="">-- Select Gender --</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <input type="tel" name="phone" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Enter your phone number" required>
                            </div>
                        </div>

                        <!-- Row 4: Password + Confirm Password -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Enter your password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Confirm your password" required>
                            </div>
                        </div>

                        <!-- Sign Up Button -->
                        <button type="submit" class="btn btn-teal w-100 py-2 fw-bold rounded-3 shadow-sm">Sign Up</button>
                    </form>

                    <hr class="my-4">

                    <!-- Login Redirect -->
                    <div class="text-center">
                        <p class="mb-1">Already have an account?</p>
                        <a href="user/login" 
                           class="btn btn-outline-teal mt-2 w-100 py-2 fw-bold rounded-3 shadow-sm">
                            Login Here
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
