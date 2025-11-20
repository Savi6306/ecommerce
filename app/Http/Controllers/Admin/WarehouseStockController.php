<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\WarehouseStock;

class WarehouseStockController extends Controller
{
    public function index()
    {
        $stocks = WarehouseStock::with(['warehouse', 'product'])->latest()->paginate(15);
        return view('admin.inventory.stock.index', compact('stocks'));
    }
}
