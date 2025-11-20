<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display all products
     */
    public function index()
    {
        $products = Product::with(['category', 'brand'])->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show create product form
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a new product
     */
    public function store(Request $request)
    {
        $request->validate([
            'seller_id' => 'nullable|exists:sellers,id', // optional
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'type' => 'nullable|string|in:inhouse,affiliate',
            'status' => 'nullable|string|in:active,inactive',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Handle image upload
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null;

        // Create product
        Product::create([
            'seller_id' => $request->seller_id ?? 1, // admin can leave null
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'sku' => $request->sku,
            'price' => $request->price,
            'discount_price' => $request->discount_price ?? null,
            'stock' => $request->stock ?? 0,
            'type' => $request->type ?? 'inhouse',
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'status' => $request->status ?? 'active',
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', '✅ Product added successfully!');
    }

    /**
     * Show edit product form
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update product
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'seller_id' => 'nullable|exists:sellers,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'type' => 'nullable|string|in:inhouse,affiliate',
            'status' => 'nullable|string|in:active,inactive',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only([
            'seller_id', 'name', 'category_id', 'brand_id', 'description', 'price',
            'discount_price', 'stock', 'status', 'type'
        ]);

        $data['slug'] = Str::slug($request->name);
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

        // Handle image replacement
        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', '✅ Product updated successfully!');
    }

    /**
     * Delete product
     */
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', '🗑️ Product deleted successfully!');
    }
}
