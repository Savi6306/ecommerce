<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
        <link rel="icon" type="image/png" href="/images/PGMS Logo.png">

</head>
<body>
  @extends('layout.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm rounded-3 border-0">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4 text-teal fw-bold">Forgot Password</h3>

                    {{-- Success/Error Messages --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    {{-- Forgot Password Form --}}
                    <form action="{{ route('password.send') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Enter your Email</label>
                            <input type="email" name="email" id="email"
                                   class="form-control border-teal shadow-sm"
                                   placeholder="example@email.com" required autofocus>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-teal w-100 mt-2">
                            Send Reset Link
                        </button>
                    </form>

                    <hr class="my-4">

                    {{-- Back to Login --}}
                    <div class="text-center">
                        <a href="{{ route('user.login') }}" 
                           class="btn btn-outline-teal w-100">
                            Back to Login
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
        color: #fff;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-teal:hover {
        background-color: #006666;
    }
    .btn-outline-teal {
        border: 2px solid #008080;
        color: #008080;
        font-weight: 600;
        border-radius: 8px;
    }
    .btn-outline-teal:hover {
        background-color: #008080;
        color: #fff;
    }
    .text-teal {
        color: #008080;
    }
    .border-teal {
        border: 1px solid #008080 !important;
    }
</style>
@endsection
</body>
</html>