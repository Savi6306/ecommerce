<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryTracking;
use App\Models\Admin\ShippingPartner;
use Illuminate\Http\Request;

class DeliveryTrackingController extends Controller
{
    public function index()
    {
        $trackings = DeliveryTracking::with('partner')->latest()->paginate(15);
        return view('admin.shipping.tracking.index', compact('trackings'));
    }

    public function create()
    {
        $partners = ShippingPartner::all();
        return view('admin.shipping.tracking.create', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|unique:delivery_trackings',
            'shipping_partner_id' => 'nullable|exists:shipping_partners,id',
            'status' => 'required|string',
        ]);

        DeliveryTracking::create([
            'tracking_number' => $request->tracking_number,
            'order_number' => $request->order_number,
            'shipping_partner_id' => $request->shipping_partner_id,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.shipping.tracking.index')
            ->with('success', 'Tracking added successfully.');
    }

    public function show(DeliveryTracking $tracking)
    {
        $tracking->load('partner', 'updates');
        return view('admin.shipping.tracking.show', compact('tracking'));
    }

    public function destroy(DeliveryTracking $tracking)
    {
        $tracking->delete();
        return back()->with('success', 'Tracking deleted successfully.');
    }
}
