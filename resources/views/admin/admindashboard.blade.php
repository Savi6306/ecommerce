@extends('admin.layouts.app')

@section('title','Admin Dashboard')

@section('content')
<div class="container-fluid">

    <div class="row mt-4">
        <div class="col-md-3 mb-3">
            <div class="card p-3 text-center shadow-sm">
                <h6>Total Users</h6>
                <h3>{{ $totalUsers ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card p-3 text-center shadow-sm">
                <h6>Total Sellers</h6>
                <h3>{{ $totalSellers ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card p-3 text-center shadow-sm">
                <h6>Total Products</h6>
                <h3>{{ $totalProducts ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card p-3 text-center shadow-sm">
                <h6>Total Orders</h6>
                <h3>{{ $totalOrders ?? 0 }}</h3>
            </div>
        </div>
    </div>

    @if(isset($lowStockProducts) && $lowStockProducts->count())
<div class="alert alert-warning">
    <strong>Low Stock Products:</strong>
    <ul>
        @foreach($lowStockProducts as $p)
            <li>{{ $p->name }} (Stock: {{ $p->stock }})</li>
        @endforeach
    </ul>
</div>
@endif


    {{-- Charts --}}
    <div class="card mt-4 p-3 shadow-sm">
        <h5>📈 Monthly Sales ({{ now()->year }})</h5>
        <canvas id="salesChart" height="100"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('salesChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($months ?? []),   // fallback to empty array
        datasets: [{
            label: 'Sales (₹)',
            data: @json($totals ?? []), // fallback to empty array
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        scales: { y: { beginAtZero: true, ticks: { callback: v => '₹'+v } } },
        plugins: { legend: { display: false } }
    }
});
</script>

@endsection
