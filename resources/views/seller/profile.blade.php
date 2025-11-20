@extends('seller.layouts.app')

@section('content')
<div class="container-fluid py-4">

    {{-- Profile Header --}}
    <div class="card mb-4 shadow-sm p-3 d-flex flex-row align-items-center">
        <img src="{{ $seller->profile_photo ?? asset('images/default-profile.png') }}" 
             class="rounded-circle me-3" width="80" height="80" alt="Profile Picture">
        <div>
            <h3 class="fw-bold">{{ $seller->store_name ?? $seller->name }}</h3>
            <p class="text-muted mb-1">{{ $seller->email }}</p>
            <p class="text-muted mb-0">Rating: 
                @for ($i=0; $i<5; $i++)
                    @if($i < round($seller->rating ?? 0))
                        <span class="text-warning">&#9733;</span>
                    @else
                        <span class="text-secondary">&#9733;</span>
                    @endif
                @endfor
            </p>
        </div>
    </div>

    <div class="row">

        {{-- Left Column: Store & Account Info --}}
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm p-3">
                <h5 class="fw-semibold mb-3">Store Info</h5>
                <p><strong>Store Name:</strong> {{ $seller->store_name }}</p>
                <p><strong>Phone:</strong> {{ $seller->phone ?? '-' }}</p>
                <p><strong>Address:</strong> {{ $seller->address ?? '-' }}</p>
                <p><strong>Business ID:</strong> {{ $seller->business_id ?? '-' }}</p>
            </div>

            <div class="card mb-4 shadow-sm p-3">
                <h5 class="fw-semibold mb-3">Account Settings</h5>
                <a href="{{ route('seller.profile.edit') }}" class="btn btn-outline-primary mb-2 w-100">Edit Profile</a>
                <a href="{{ route('seller.changePassword') }}" class="btn btn-outline-secondary w-100">Change Password</a>
            </div>
        </div>

        {{-- Right Column: Sales Summary & Top Products --}}
        <div class="col-lg-8">
            <div class="card mb-4 shadow-sm p-3">
                <h5 class="fw-semibold mb-3">Sales Summary</h5>
                <div class="row text-center mb-3">
                    <div class="col">
                        <h6>Total Orders</h6>
                        <p class="fw-bold">{{ $salesSummary['total_orders'] ?? 0 }}</p>
                    </div>
                    <div class="col">
                        <h6>Pending Orders</h6>
                        <p class="fw-bold">{{ $salesSummary['pending_orders'] ?? 0 }}</p>
                    </div>
                    <div class="col">
                        <h6>Completed Orders</h6>
                        <p class="fw-bold">{{ $salesSummary['completed_orders'] ?? 0 }}</p>
                    </div>
                    <div class="col">
                        <h6>Total Earnings</h6>
                        <p class="fw-bold">₹{{ number_format($salesSummary['total_earnings'] ?? 0, 2) }}</p>
                    </div>
                </div>

                {{-- Monthly Sales Chart --}}
                <h5 class="fw-semibold mb-3 text-center">📈 Monthly Sales ({{ now()->year }})</h5>
                <canvas id="monthlySalesChart" height="100"></canvas>
            </div>

            <div class="card shadow-sm p-3">
                <h5 class="fw-semibold mb-3">Top Selling Products</h5>
                @if($topProducts->count() > 0)
                    <ul class="list-group">
                        @foreach($topProducts as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}
                            <span class="badge bg-primary rounded-pill">{{ $product->total_sold }} sold</span>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted text-center">No products sold yet.</p>
                @endif
            </div>
        </div>

    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const salesData = @json($monthlySales ?? array_fill(0,12,0));

    new Chart(document.getElementById('monthlySalesChart'), {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Sales (₹)',
                data: salesData,
                backgroundColor: 'rgba(54, 162, 235, 0.7)'
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });
});
</script>
@endsection
