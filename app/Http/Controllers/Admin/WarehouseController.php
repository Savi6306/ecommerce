<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::latest()->paginate(10);
        return view('admin.inventory.warehouse.index', compact('warehouses'));
    }

    public function create()
    {
        return view('admin.inventory.warehouse.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Warehouse::create($request->only('name', 'location'));
        return redirect()->route('admin.inventory.warehouse.index')->with('success', 'Warehouse added successfully.');
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return back()->with('success', 'Warehouse deleted successfully.');
    }
}
