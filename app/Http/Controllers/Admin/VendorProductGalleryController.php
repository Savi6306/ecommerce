<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductImage;
use App\Models\Admin\VendorProduct;
use Illuminate\Support\Facades\Storage;

class VendorProductGalleryController extends Controller
{
    // Show all gallery images
    public function index($productId)
    {
        $product = VendorProduct::findOrFail($productId);

        // Fetch images using product_id
        $images = $product->images()->orderBy('position')->get();

        return view('admin.vendor_products.gallery.index', compact('product', 'images'));
    }

    // Upload new image
    public function store(Request $request, $productId)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $product = VendorProduct::findOrFail($productId);

        $path = $request->file('image')->store('vendor_products', 'public');

        // save using product_id automatically
        $product->images()->create([
            'image_path' => $path,
            'position' => $product->images()->count() + 1,
        ]);

        // Redirect to gallery index so view always has $product
        return redirect()
            ->route('admin.vendor_products.gallery.index', $productId)
            ->with('success', 'Image uploaded successfully!');
    }

    // Set featured image
    public function setFeatured($id)
    {
        $image = ProductImage::findOrFail($id);
        $productId = $image->product_id;

        // get product via relationship (ensure ProductImage->product() belongsTo VendorProduct)
        $product = $image->product;

        if (!$product) {
            return redirect()->back()->with('error', 'Parent product not found.');
        }

        // Reset featured flag for all images of this product
        $product->images()->update(['is_featured' => false]);

        // Set selected image as featured
        $image->is_featured = true;
        $image->save();

        return redirect()
            ->route('admin.vendor_products.gallery.index', $productId)
            ->with('success', 'Featured image updated!');
    }

    // Reorder gallery (expects request->order = [imageId, imageId, ...] in new order)
    public function reorder(Request $request)
    {
        $request->validate(['order' => 'required|array']);

        foreach ($request->order as $position => $id) {
            ProductImage::where('id', $id)->update(['position' => $position + 1]);
        }

        return response()->json(['status' => 'ok']);
    }

    // Delete image
    public function destroy($id)
    {
        $image = ProductImage::findOrFail($id);
        $productId = $image->product_id;

        if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return redirect()
            ->route('admin.vendor_products.gallery.index', $productId)
            ->with('success', 'Image deleted successfully!');
    }
}
