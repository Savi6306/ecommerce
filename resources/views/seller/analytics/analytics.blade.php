@extends('seller.layouts.app')

@section('content')
<div class="container-fluid py-4">

    <h2 class="fw-bold mb-4">📈 Store Analytics</h2>

    {{-- Monthly Sales Chart --}}
    <div class="card shadow-sm mb-4 p-3">
        <h5 class="fw-semibold text-center">Monthly Sales ({{ now()->year }})</h5>
        @if(array_sum($salesData) > 0)
            <canvas id="monthlySalesChart" height="100"></canvas>
        @else
            <p class="text-center text-muted my-3">No sales data available for this year.</p>
        @endif
    </div>

    {{-- Top Products --}}
    <div class="card shadow-sm mb-4 p-3">
        <h5 class="fw-semibold mb-3">🏆 Top 5 Selling Products</h5>
        <ul class="list-group">
            @forelse($topProducts as $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $product->name }}
                    <span class="badge bg-primary rounded-pill">{{ $product->total_sold }} sold</span>
                </li>
            @empty
                <li class="list-group-item text-center text-muted">No products sold yet.</li>
            @endforelse
        </ul>
    </div>


    {{-- Category Wise Sales --}}
    <div class="card shadow-sm mb-4 p-3">
        <h5 class="fw-semibold text-center">🛍️ Category-wise Sales</h5>
        @if($categorySales->count() > 0)
            <canvas id="categoryChart" height="100"></canvas>
        @else
            <p class="text-center text-muted my-3">No category sales data available yet.</p>
        @endif
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Monthly Sales Chart
    @if(array_sum($salesData) > 0)
    new Chart(document.getElementById('monthlySalesChart'), {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Sales (₹)',
                data: @json(array_map('floatval', $salesData)),
                backgroundColor: 'rgba(54, 162, 235, 0.7)'
            }]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });
    @endif


    // Category-wise Sales
    @if($categorySales->count() > 0)
    new Chart(document.getElementById('categoryChart'), {
        type: 'pie',
        data: {
            labels: @json($categorySales->pluck('category')),
            datasets: [{
                data: @json($categorySales->pluck('total_sold')->map(fn($v) => (int)$v)),
                backgroundColor: ['#FF6384','#36A2EB','#FFCE56','#4BC0C0','#9966FF']
            }]
        },
        options: { responsive: true }
    });
    @endif

});
</script>
@endsection
