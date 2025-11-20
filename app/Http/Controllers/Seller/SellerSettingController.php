<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerSettingController extends Controller
{
    public function index()
    {
        $seller = Auth::guard('seller')->user();
        return view('seller.settings.index', compact('seller'));
    }

    public function update(Request $request)
    {
        $seller = Auth::guard('seller')->user();

        $request->validate([
            'store_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('profile_photo')) {

            // Delete old photo if exists
            if ($seller->profile_photo && Storage::disk('public')->exists($seller->profile_photo)) {
                Storage::disk('public')->delete($seller->profile_photo);
            }

            // Upload new photo
            $path = $request->file('profile_photo')->store('sellers', 'public');
            $seller->profile_photo = $path;
        }

        // Update other fields
        $seller->store_name = $request->store_name;
        $seller->phone = $request->phone;
        $seller->address = $request->address;

        $seller->save();

        return redirect()->route('seller.settings')
                         ->with('success', 'Settings updated successfully!');
    }
}
