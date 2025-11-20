<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Promotion;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;   // ✅ ADD THIS

class PromotionController extends Controller
{
    // Show all promotions
    public function index()
    {
        $promotions = Promotion::latest()->paginate(10);
        return view('admin.promotions.index', compact('promotions'));
    }
public function show(Promotion $promotion)
{
    return view('admin.promotions.show', compact('promotion'));
}

    // Create form
    public function create()
    {
        return view('admin.promotions.create');
    }

    // Store new promotion
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'discount' => 'nullable|numeric|min:0',
            'coupon_code' => 'nullable|string|max:50|unique:promotions,coupon_code',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'banner' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('promotion_banners', 'public');
        }

        Promotion::create($data);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion added successfully!');
    }

    // Edit
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    // Update
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'discount' => 'nullable|numeric|min:0',
            'coupon_code' => 'nullable|string|max:50|unique:promotions,coupon_code,' . $promotion->id,
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'banner' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('promotion_banners', 'public');
        }

        $promotion->update($data);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion updated successfully!');
    }

    // Delete
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion deleted successfully!');
    }
    // List only banners
public function banners()
{
    $banners = Promotion::where('type', 'banner')->latest()->paginate(10);
    return view('admin.promotions.banners', compact('banners'));
}

// Show create banner form
public function createBanner()
{
    return view('admin.promotions.create_banner');
}

// Store banner
public function storeBanner(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'banner' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'status' => 'nullable|boolean'
    ]);

    $data['type'] = 'banner';

    if($request->hasFile('banner')){
        $data['banner'] = $request->file('banner')->store('banners','public');
    }

    Promotion::create($data);

    return redirect()->route('admin.promotions.banners')->with('success','Banner added successfully.');
}

// Show edit banner form
public function editBanner(Promotion $banner)
{
    return view('admin.promotions.edit_banner', compact('banner'));
}

// Update banner
public function updateBanner(Request $request, Promotion $banner)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'banner' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'status' => 'nullable|boolean'
    ]);

    if($request->hasFile('banner')){
        if($banner->banner){
            Storage::disk('public')->delete($banner->banner);
        }
        $data['banner'] = $request->file('banner')->store('banners','public');
    }

    $banner->update($data);

    return redirect()->route('admin.promotions.banners')->with('success','Banner updated successfully.');
}

// Delete banner
public function destroyBanner(Promotion $banner)
{
    if($banner->banner){
        Storage::disk('public')->delete($banner->banner);
    }

    $banner->delete();

    return back()->with('success','Banner deleted successfully.');
}
// ---------------------------
    // OFFERS & DEALS
    // ---------------------------
    public function offers()
    {
        $offers = Promotion::where('type','offer')->latest()->paginate(10);
        return view('admin.promotions.offers', compact('offers'));
    }

    public function createOffer()
    {
        return view('admin.promotions.create_offer');
    }

    public function storeOffer(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'nullable|numeric|min:0|max:100',
            'coupon_code' => 'nullable|string|unique:promotions,coupon_code',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Promotion::create([
            'title' => $request->title,
            'type' => 'offer',
            'discount' => $request->discount,
            'coupon_code' => $request->coupon_code,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.promotions.offers')->with('success', 'Offer created successfully.');
    }

    public function editOffer(Promotion $offer)
    {
        return view('admin.promotions.edit_offer', compact('offer'));
    }

    public function updateOffer(Request $request, Promotion $offer)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'nullable|numeric|min:0|max:100',
            'coupon_code' => 'nullable|string|unique:promotions,coupon_code,'.$offer->id,
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $offer->update([
            'title' => $request->title,
            'discount' => $request->discount,
            'coupon_code' => $request->coupon_code,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.promotions.offers')->with('success', 'Offer updated successfully.');
    }

    public function destroyOffer(Promotion $offer)
    {
        $offer->delete();
        return back()->with('success', 'Offer deleted successfully.');
    }

    // ---------------------------
    // NOTIFICATIONS
    // ---------------------------
    public function notifications()
    {
        $notifications = Promotion::where('type','notification')->latest()->paginate(10);
        return view('admin.promotions.notifications', compact('notifications'));
    }

    public function createNotification()
    {
        return view('admin.promotions.create_notification');
    }

    public function storeNotification(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Promotion::create([
            'title' => $request->title,
            'type' => 'notification',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.promotions.notifications')->with('success','Notification created successfully.');
    }

    // ---------------------------
    // ANNOUNCEMENTS
    // ---------------------------
    public function announcements()
    {
        $announcements = Promotion::where('type','announcement')->latest()->paginate(10);
        return view('admin.promotions.announcements', compact('announcements'));
    }

    public function createAnnouncement()
    {
        return view('admin.promotions.create_announcement');
    }

    public function storeAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Promotion::create([
            'title' => $request->title,
            'type' => 'announcement',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.promotions.announcements')->with('success','Announcement created successfully.');
    }

}
