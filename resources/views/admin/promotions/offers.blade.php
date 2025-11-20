@extends('admin.layouts.app')

@section('title','Offers & Deals')

@section('content')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Offers & Deals</h4>
        <a href="{{ route('admin.promotions.offers.create') }}" class="btn btn-primary">+ Add New Offer</a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Offers Table --}}
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Discount (%)</th>
                    <th>Coupon Code</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($offers as $offer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $offer->title }}</td>
                        <td>{{ $offer->discount ?? '-' }}</td>
                        <td>{{ $offer->coupon_code ?? '-' }}</td>
                        <td>
                            @if($offer->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $offer->start_date }}</td>
                        <td>{{ $offer->end_date }}</td>
                        <td>
                            <a href="{{ route('admin.promotions.offers.edit', $offer) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.promotions.offers.destroy', $offer) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No offers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $offers->links() }}
    </div>

</div>
@endsection
