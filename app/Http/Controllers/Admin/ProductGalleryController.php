<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\VendorProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductGalleryController extends Controller
{
    // Show gallery
    public function index(VendorProduct $product)
    {
        $product->load('gallery');
        return view('admin.product_gallery.index', compact('product'));
    }

    // Upload multiple images
    public function store(Request $request, VendorProduct $product)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        foreach ($request->file('images', []) as $file) {
            $path = $file->store('product_gallery', 'public');
            ProductGallery::create([
                'product_id' => $product->id,
                'image' => $path,
            ]);
        }

        return back()->with('success', 'Images uploaded successfully.');
    }

    // Delete an image
    public function destroy(ProductGallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

    // Set featured image
    public function setFeatured(ProductGallery $gallery)
    {
        ProductGallery::where('product_id', $gallery->product_id)->update(['is_featured' => false]);
        $gallery->update(['is_featured' => true]);

        return back()->with('success', 'Featured image updated.');
    }
}
