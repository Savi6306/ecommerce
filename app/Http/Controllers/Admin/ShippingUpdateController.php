<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryTracking;
use App\Models\Admin\ShippingUpdate;
use Illuminate\Http\Request;

class ShippingUpdateController extends Controller
{
    public function create(DeliveryTracking $tracking)
    {
        return view('admin.shipping.updates.create', compact('tracking'));
    }

    public function store(Request $request, DeliveryTracking $tracking)
    {
        $request->validate(['status' => 'required|string']);
        $tracking->updates()->create($request->all());
        return redirect()->route('admin.shipping.tracking.show', $tracking->id)->with('success', 'Update added!');
    }

    public function destroy(DeliveryTracking $tracking, ShippingUpdate $update)
    {
        $update->delete();
        return back()->with('success', 'Update deleted.');
    }
    public function edit(ShippingUpdate $update)
{
    return view('admin.shipping.updates.edit', compact('update'));
}

public function update(Request $request, ShippingUpdate $update)
{
    $request->validate([
        'status' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'remarks' => 'nullable|string',
    ]);

    $update->update($request->only('status', 'location', 'remarks'));

    return redirect()
        ->route('admin.shipping.tracking.show', $update->delivery_tracking_id)
        ->with('success', 'Status update successfully updated!');
}

}
