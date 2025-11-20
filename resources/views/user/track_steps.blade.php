@extends('layout.app')

@section('content')
<div class="container my-5">
    <h3 class="text-center mb-4" style="color:#009688; font-weight:700;">Track Your Order</h3>

    <div class="card shadow-lg border-0 rounded-4 p-4">
        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <div class="mb-3 mb-md-0">
                <h5 class="fw-bold mb-1">Order ID: #{{ $order->id }}</h5>
                <p class="mb-1"><strong>Status:</strong> {{ ucfirst($order->status ?? 'Pending') }}</p>
                <p class="mb-0"><strong>Expected Delivery:</strong> {{ $order->expected_date ?? '—' }}</p>
            </div>
            <div>
                <img src="/images/PGMS Logo.png" width="90" alt="PGMS Logo">
            </div>
        </div>

        {{-- Step Tracker --}}
        <div class="track-container">
            <div class="track">
                @php
                    $steps = ['Order Placed', 'Packed', 'Shipped', 'Out for Delivery', 'Delivered'];
                    $current = strtolower($order->status ?? 'pending');
                    $currentStep = match($current) {
                        'pending' => 1,
                        'processing', 'packed' => 2,
                        'shipped' => 3,
                        'out for delivery' => 4,
                        'delivered' => 5,
                        default => 1,
                    };
                @endphp

                @foreach ($steps as $index => $step)
                    @php
                        $stepNumber = $index + 1;
                        $isActive = $stepNumber <= $currentStep;
                    @endphp
                    <div class="step {{ $isActive ? 'active' : '' }}">
                        <div class="icon">
                            @if($isActive)
                                <i class="fa fa-check"></i>
                            @else
                                <i class="fa fa-circle"></i>
                            @endif
                        </div>
                        <div class="label">{{ $step }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Order Progress Info --}}
        <div class="mt-4">
            <h6 class="fw-bold" style="color:#009688;">Order Details</h6>
            <ul class="list-unstyled mb-0">
                <li><strong>Payment Method:</strong> {{ ucfirst($order->payment_method ?? '—') }}</li>
                <li><strong>Placed Order On:</strong> {{ $order->created_at ? $order->created_at->format('d M Y, h:i A') : '—' }}</li>
            
            </ul>
        </div>

@if($order->deliveryPartner)
    <div class="mt-3 p-3 border rounded bg-light">
        <p><strong>Delivery Partner:</strong> {{ $order->deliveryPartner->name }}</p>
        <p><strong>Contact:</strong> {{ $order->deliveryPartner->contact_number }}</p>

        @if($order->tracking_id)
            <p><strong>Tracking ID:</strong> {{ $order->tracking_id }}</p>
          
        @else
            <p class="text-muted">Tracking ID not available yet</p>
        @endif
    </div>
@else
    <p class="text-muted">Delivery partner not assigned yet</p>
@endif



        {{-- After your progress steps --}}
<div class="mt-5">
    <h6 class="fw-bold" style="color:#009688;">📍 Live Tracking Updates</h6>

    @if($order->trackingUpdates->isEmpty())
        <p class="text-muted">No location updates available yet.</p>
    @else
        <ul class="timeline">
            @foreach($order->trackingUpdates as $update)
                <li>
                    <div class="timeline-time"><br>{{ $update->created_at->format('d M Y, h:i A') }}</div>
                    <div class="timeline-content">
                        <strong>{{ $update->location }}</strong> – {{ $update->message }}
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>

    </div>
</div>

{{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

{{-- Styles --}}
<style>
.track-container {
    position: relative;
    margin: 40px 0;
}
.track {
    display: flex;
    justify-content: space-between;
    position: relative;
    width: 100%;
}
.track::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 8%;
    width: 84%;
    height: 4px;
    background: #dcdcdc;
    z-index: 1;
    transform: translateY(-50%);
}
.step {
    text-align: center;
    position: relative;
    z-index: 2;
    flex: 1;
}
.step .icon {
    background: #dcdcdc;
    color: #fff;
    width: 45px;
    height: 45px;
    margin: 0 auto;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: all 0.3s ease;
}
.step.active .icon {
    background: #009688;
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(0,150,136,0.5);
}
.step .label {
    margin-top: 10px;
    font-weight: 600;
    font-size: 14px;
    color: #666;
}
.step.active .label {
    color: #009688;
}
@media (max-width: 768px) {
    .track::before {
        left: 10%;
        width: 80%;
    }
    .step .label {
        font-size: 12px;
    }
}

.timeline {
    list-style: none;
    position: relative;
    padding-left: 20px;
}
.timeline::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 0;
    width: 3px;
    height: 100%;
    background: #009688;
}
.timeline li {
    margin-bottom: 20px;
    position: relative;
}
.timeline li::before {
    content: '';
    position: absolute;
    left: -1px;
    top: 5px;
    width: 12px;
    height: 12px;
    background: #009688;
    border-radius: 50%;
}
.timeline-time {
    font-size: 12px;
    color: gray;
}
.timeline-content {
    background: #f9f9f9;
    border-radius: 8px;
    padding: 10px;
    margin-left: 20px;
}

</style>
@endsection
