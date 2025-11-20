<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ShippingPartner;
use Illuminate\Http\Request;

class ShippingPartnerController extends Controller
{
    public function index()
    {
        $partners = ShippingPartner::latest()->paginate(10);
        return view('admin.shipping.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.shipping.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        ShippingPartner::create($request->only('name', 'contact_email', 'contact_phone', 'active'));
        return redirect()->route('admin.shipping.partners.index')->with('success', 'Shipping Partner created.');
    }

    public function edit(ShippingPartner $partner)
    {
        return view('admin.shipping.partners.edit', compact('partner'));
    }

    public function update(Request $request, ShippingPartner $partner)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $partner->update($request->only('name', 'contact_email', 'contact_phone', 'active'));
        return redirect()->route('admin.shipping.partners.index')->with('success', 'Partner updated.');
    }

    public function destroy(ShippingPartner $partner)
    {
        $partner->delete();
        return back()->with('success', 'Partner deleted.');
    }
}
