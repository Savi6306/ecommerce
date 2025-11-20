<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    // All Sellers
    public function index()
    {
        $sellers = Seller::latest()->paginate(10);
        return view('admin.sellers.index', compact('sellers'));
    }

    

    // Pending Approvals
    public function approvals()
    {
        $sellers = Seller::where('is_verified', false)->paginate(10);
        return view('admin.sellers.approvals', compact('sellers'));
    }

    // Approve Seller
    public function verify($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->update(['is_verified' => true]);
        return back()->with('success', 'Seller verified successfully!');
    }

    // Commission (static example)
    public function commission()
    {
        $sellers = Seller::select('id', 'name', 'store_name', 'is_verified')->paginate(10);
        return view('admin.sellers.commission', compact('sellers'));
    }

    // Analytics
    public function analytics()
    {
        $analytics = [
            'total_sellers' => Seller::count(),
            'verified_sellers' => Seller::where('is_verified', true)->count(),
            'unverified_sellers' => Seller::where('is_verified', false)->count(),
            'whatsapp_optin' => Seller::where('whatsapp_updates', true)->count(),
        ];

        $recent = Seller::latest()->take(10)->get();

        return view('admin.sellers.analytics', compact('analytics', 'recent'));
    }
}
