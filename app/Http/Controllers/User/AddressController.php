<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // Show form to add address
    public function create()
    {
        return view('user.create');
    }

    // Store address
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'phone'         => 'required|string|max:15',
            'pincode'       => 'required|string|max:10',
            'state'         => 'required|string|max:255',
            'city'          => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
        ]);

        // ✅ Ensure user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add an address.');
        }

        $address = new Address();
        $address->user_id = Auth::id(); // ✅ Logged-in user's ID
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->pincode = $request->pincode;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->address_line1 = $request->address_line1;
        $address->address_line2 = $request->address_line2;
        $address->is_default = $request->has('is_default') ? 1 : 0;
        $address->save();

        return redirect()->route('user.addresses')->with('success', 'Address added successfully!');
    }

    // Show all addresses
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->get();
        return view('user.addresses', compact('addresses'));
    }

    // Edit address
    public function edit($id)
    {
        $address = Address::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        return view('user.edit_address', compact('address'));
    }

    // Update address
    public function update(Request $request, $id)
    {
        $address = Address::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $address->update([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'pincode'       => $request->pincode,
            'state'         => $request->state,
            'city'          => $request->city,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'is_default'    => $request->has('is_default') ? 1 : 0,
        ]);

        return redirect()->route('user.addresses')->with('success', 'Address updated successfully!');
    }

    // Delete address
    public function destroy($id)
    {
        $address = Address::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        $address->delete();

        return redirect()->route('user.addresses')->with('success', 'Address deleted successfully!');
    }
}
