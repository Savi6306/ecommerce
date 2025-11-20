@extends('seller.layouts.app')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h2 class="fw-bold">👋 Welcome, {{ Auth::guard('seller')->user()->name ?? 'Seller' }}</h2>
        <p class="text-muted">Here's your store overview</p>
    </div>

    {{-- Stats Cards --}}
    <div class="d-flex gap-3 overflow-auto mb-4 pb-2">
        <div class="card shadow-sm flex-shrink-0 text-white bg-primary" style="width: 180px;">
            <div class="card-body text-center">
                <i class="bi bi-box-seam fs-2 mb-2"></i>
                <h6>Total Products</h6>
                <h2 class="fw-bold">{{ $totalProducts ?? 0 }}</h2>
            </div>
        </div>

        <div class="card shadow-sm flex-shrink-0 text-white bg-success" style="width: 180px;">
            <div class="card-body text-center">
                <i class="bi bi-bag fs-2 mb-2"></i>
                <h6>Total Orders Today</h6>
                <h2 class="fw-bold">{{ $totalOrdersToday ?? 0 }}</h2>
            </div>
        </div>

        <div class="card shadow-sm flex-shrink-0 text-dark bg-warning" style="width: 180px;">
            <div class="card-body text-center">
                <i class="bi bi-hourglass-split fs-2 mb-2"></i>
                <h6>Pending Orders</h6>
                <h2 class="fw-bold">{{ $pendingOrdersToday ?? 0 }}</h2>
            </div>
        </div>

        <div class="card shadow-sm flex-shrink-0 text-white bg-info" style="width: 180px;">
            <div class="card-body text-center">
                <i class="bi bi-truck fs-2 mb-2"></i>
                <h6>In Transit</h6>
                <h2 class="fw-bold">{{ $inTransitOrdersToday ?? 0 }}</h2>
            </div>
        </div>

        <div class="card shadow-sm flex-shrink-0 text-white bg-secondary" style="width: 180px;">
            <div class="card-body text-center">
                <i class="bi bi-check2-circle fs-2 mb-2"></i>
                <h6>Approved Orders</h6>
                <h2 class="fw-bold">{{ $approvedOrdersToday ?? 0 }}</h2>
            </div>
        </div>
    </div>

    {{-- Sales Chart --}}
    <div class="card shadow-sm rounded-3 p-3 mb-4">
        <h5 class="mb-3 fw-semibold text-center">📊 Monthly Sales ({{ now()->year }})</h5>

        @if(!empty($salesData) && array_sum($salesData) > 0)
            <canvas id="salesChart" height="120"></canvas>
        @else
            <p class="text-center text-muted my-3">No sales data available for this year.</p>
        @endif
    </div>

</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('salesChart');
    @if(!empty($salesData) && array_sum($salesData) > 0)
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Sales (₹)',
                data: @json(array_map('floatval', $salesData)),
                backgroundColor: ctx => ctx.dataIndex === new Date().getMonth() ? 'rgba(255,99,132,0.8)' : 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#eee' } },
                x: { grid: { display: false } }
            }
        }
    });
    @endif
});
</script>

{{-- Hover effect --}}
<style>
.card:hover {
    transform: translateY(-5px);
    transition: 0.3s;
}
</style>
@endsection
