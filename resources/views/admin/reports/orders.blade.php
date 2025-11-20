@extends('admin.layouts.app')
@section('title', 'Order Reports')

@section('content')
<div class="container mt-4">
    <h4>🧾 Order Reports</h4>
    <hr>

    <div class="card mb-4">
        <div class="card-body text-center">
            <h5>Total Orders: {{ $totalOrders }}</h5>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header fw-bold">📊 Orders by Status</div>
        <div class="card-body">
            <canvas id="orderChart" height="100"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('orderChart');
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: {!! json_encode(array_keys($orderStats)) !!},
        datasets: [{
            data: {!! json_encode(array_values($orderStats)) !!},
            backgroundColor: ['#f39c12', '#3498db', '#2ecc71', '#e74c3c']
        }]
    }
});
</script>
@endsection
