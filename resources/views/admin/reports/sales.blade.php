@extends('admin.layouts.app')
@section('title', 'Sales Reports')

@section('content')
<div class="container mt-4">
    <h4>💰 Sales Reports</h4>
    <hr>

    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Sales</h5>
                    <h3>₹{{ number_format($totalSales, 2) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Today's Sales</h5>
                    <h3>₹{{ number_format($todaySales, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header fw-bold">📈 Monthly Sales Trend</div>
        <div class="card-body">
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('salesChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($monthlySales->keys()) !!},
        datasets: [{
            label: 'Monthly Sales (₹)',
            data: {!! json_encode($monthlySales->values()) !!},
            backgroundColor: 'rgba(75, 192, 192, 0.6)'
        }]
    }
});
</script>
@endsection
