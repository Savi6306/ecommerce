<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\VendorProduct;
use App\Models\Seller;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Admin\Attribute;
use Illuminate\Support\Str;

class VendorProductController extends Controller
{
    // Show all vendor products
    public function index()
    {
        $products = VendorProduct::with('vendor', 'category', 'brand')->latest()->paginate(10);
        return view('admin.vendor_products.index', compact('products'));
    }

    // Show create form
    public function create()
    {
        $vendors = Seller::all();
        $categories = Category::all();
        $brands = Brand::all();
        $attributes = Attribute::where('status', 'active')->get();

        return view('admin.vendor_products.create', compact('vendors', 'categories', 'brands', 'attributes'));
    }

    // Store new vendor product
    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required|exists:sellers,id',
            'name' => 'required|unique:vendor_products,name',
            'sku' => 'required|unique:vendor_products,sku',
            'price' => 'required|numeric',
        ]);

        $product = VendorProduct::create([
            'vendor_id' => $request->vendor_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock ?? 0,
            'type' => 'vendor',
            'is_featured' => $request->is_featured ? true : false,
            'status' => $request->status ?? 'active',
            'description' => $request->description,
        ]);

        if ($request->has('attributes') && is_array($request->attributes)) {
            foreach ($request->attributes as $attr_id => $value) {
                if (!empty($attr_id) && $value !== null && $value !== '') {
                    $product->attributes()->attach($attr_id, ['attribute_value' => $value]);
                }
            }
        }

        return redirect()->route('admin.vendor_products.index')
                         ->with('success', 'Vendor product added successfully!');
    }

    // Edit product
    public function edit(VendorProduct $vendor_product)
    {
        $vendors = Seller::all();
        $categories = Category::all();
        $brands = Brand::all();
        $attributes = Attribute::where('status', 'active')->get();

        return view('admin.vendor_products.edit', compact('vendor_product', 'vendors', 'categories', 'brands', 'attributes'));
    }

    // Update product
    public function update(Request $request, VendorProduct $vendor_product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:vendor_products,sku,' . $vendor_product->id,
            'price' => 'required|numeric',
        ]);

        $vendor_product->update($request->only([
            'vendor_id', 'name', 'sku', 'category_id', 'brand_id', 'price',
            'discount_price', 'stock', 'is_featured', 'status', 'description'
        ]));

        $syncData = [];
        if ($request->has('attributes') && is_array($request->attributes)) {
            foreach ($request->attributes as $attr_id => $value) {
                if (!empty($attr_id) && $value !== null && $value !== '') {
                    $syncData[$attr_id] = ['attribute_value' => $value];
                }
            }
        }

        $vendor_product->attributes()->sync($syncData);

        return redirect()->route('admin.vendor_products.index')
                         ->with('success', 'Vendor product updated successfully!');
    }

    // Delete product
    public function destroy(VendorProduct $vendor_product)
    {
        $vendor_product->attributes()->detach();
        $vendor_product->delete();

        return redirect()->route('admin.vendor_products.index')
                         ->with('success', 'Vendor product deleted!');
    }
}
