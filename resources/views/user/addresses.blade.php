@extends('layout.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Saved Addresses</h2>
        <a href="{{ route('user.create') }}" class="btn btn-teal">+ Add Your Address</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Pincode</th>
                <th>State</th>
                <th>City</th>
                <th>Address Line 1</th>
                <th>Address Line 2</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($addresses as $address)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $address->name }}</td>
                    <td>{{ $address->phone }}</td>
                    <td>{{ $address->pincode }}</td>
                    <td>{{ $address->state }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->address_line1 }}</td>
                    <td>{{ $address->address_line2 }}</td>
                    <td>
                        <a href="{{ route('user.edit', $address->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user.delete', $address->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this address?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No addresses found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    .btn-teal {
        background-color: #008080;
        color: white;
    }
    .btn-teal:hover {
        background-color: #006666;
    }
</style>
@endsection
