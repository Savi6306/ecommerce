<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('seller_id', Auth::guard('seller')->id());

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%')
                  ->orWhere('sku', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->orderBy('id', 'desc')->paginate(10);

        $totalProducts = Product::where('seller_id', Auth::guard('seller')->id())->count();
        $outOfStockProducts = Product::where('seller_id', Auth::guard('seller')->id())->where('stock', 0)->count();
        $featuredProducts = Product::where('seller_id', Auth::guard('seller')->id())->where('is_featured', 1)->count();

        return view('seller.products.index', compact('products', 'totalProducts', 'outOfStockProducts', 'featuredProducts'));
    }

    public function create()
    {
        return view('seller.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|unique:products,sku',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        $data['seller_id'] = Auth::guard('seller')->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('seller.products.index')->with('success', '✅ Product added successfully!');
    }

    public function edit(Product $product)
    {
        return view('seller.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|unique:products,sku,'.$product->id,
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('seller.products.index')->with('success', '✅ Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('seller.products.index')->with('success', '🗑️ Product deleted successfully!');
    }

    public function outOfStock()
    {
        $products = Product::where('seller_id', Auth::guard('seller')->id())
                           ->where('stock', 0)
                           ->paginate(10);

        return view('seller.products.out_of_stock', compact('products'));
    }

    public function featuredProducts()
    {
        $featuredProducts = Product::where('is_featured', 1)
                                   ->where('seller_id', Auth::guard('seller')->id())
                                   ->get();

        return view('seller.products.featured', compact('featuredProducts'));
    }
}
