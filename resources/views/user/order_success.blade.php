<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order status</title>
</head>
<body>
    @extends('layout.app')

@section('content')
<div class="container my-5 text-center">
    <div class="card shadow-sm p-5">
        <h2 class="text-success">🎉 Order Placed Successfully!</h2>
        <p>Thank you for shopping with us.</p>
        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Continue Shopping</a>
    </div>
</div>
@endsection

</body>
</html>