<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\InHouseProduct;
use Illuminate\Support\Facades\Storage;

class InHouseProductController extends Controller
{
    public function index()
    {
        $products = InHouseProduct::latest()->paginate(10);
        return view('admin.inhouse_products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.inhouse_products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:in_house_products,sku',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only('name', 'sku', 'price', 'description', 'quantity');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('inhouse_products', 'public');
            $data['image'] = 'storage/' . $path;
        }

        InHouseProduct::create($data);

        return redirect()->route('admin.inhouse_products.index')
                         ->with('success', 'Product created successfully.');
    }

    public function edit(InHouseProduct $inhouse_product)
    {
        return view('admin.inhouse_products.edit', compact('inhouse_product'));
    }

    public function update(Request $request, InHouseProduct $inhouse_product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:in_house_products,sku,' . $inhouse_product->id,
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only('name', 'sku', 'price', 'description', 'quantity');

        if ($request->hasFile('image')) {
            if ($inhouse_product->image) {
                $oldPath = str_replace('storage/', '', $inhouse_product->image);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('image')->store('inhouse_products', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $inhouse_product->update($data);

        return redirect()->route('admin.inhouse_products.index')
                         ->with('success', 'Product updated successfully.');
    }

    public function destroy(InHouseProduct $inhouse_product)
    {
        if ($inhouse_product->image) {
            $oldPath = str_replace('storage/', '', $inhouse_product->image);
            Storage::disk('public')->delete($oldPath);
        }

        $inhouse_product->delete();

        return redirect()->route('admin.inhouse_products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
