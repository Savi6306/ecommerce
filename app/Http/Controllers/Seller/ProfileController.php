<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // View profile
    public function index()
    {
        $seller = Auth::guard('seller')->user();
        return view('seller.profile.index', compact('seller'));
    }

    // Edit profile
    public function edit()
    {
        $seller = Auth::guard('seller')->user();
        return view('seller.profile.edit', compact('seller'));
    }

    // ✅ Update profile
    public function update(Request $request)
    {
        $seller = Auth::guard('seller')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'store_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        // ✅ Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Store image in /storage/app/public/seller_profiles
            $path = $request->file('profile_photo')->store('seller_profiles', 'public');

            // Save accessible public path (for admin + seller views)
            $seller->profile_photo = 'storage/' . $path;
        }

        // ✅ Update other profile details
        $seller->name = $request->name;
        $seller->store_name = $request->store_name;
        $seller->phone = $request->phone;
        $seller->address = $request->address;

        $seller->save();

        return redirect()->route('seller.profile')->with('success', 'Profile updated successfully.');
    }

    // Show change password form
    public function changePassword()
    {
        return view('seller.profile.change_password');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $seller = Auth::guard('seller')->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if (!Hash::check($request->current_password, $seller->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $seller->password = Hash::make($request->password);
        $seller->save();

        return redirect()->route('seller.profile')->with('success', 'Password updated successfully.');
    }
}
