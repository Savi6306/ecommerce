<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Address</title>
    <link rel="icon" type="image/png" href="/images/PGMS Logo.png">
</head>
<body>
    @extends('layout.app')

@section('content')
<div class="container my-5">
    <h2>Edit Address</h2>

    <form action="{{ route('user.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ $address->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ $address->phone }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pincode</label>
            <input type="text" name="pincode" value="{{ $address->pincode }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">State</label>
            <input type="text" name="state" value="{{ $address->state }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" name="city" value="{{ $address->city }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address Line 1</label>
            <input type="text" name="address_line1" value="{{ $address->address_line1 }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address Line 2</label>
            <input type="text" name="address_line2" value="{{ $address->address_line2 }}" class="form-control">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_default" class="form-check-input" 
                   {{ $address->is_default ? 'checked' : '' }}>
            <label class="form-check-label">Set as default</label>
        </div>

        <button type="submit" class="btn btn-success">Update Address</button>
        <a href="{{ route('user.addresses') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

</body>
</html>