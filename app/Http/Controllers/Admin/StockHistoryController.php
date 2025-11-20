<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\StockHistory;

class StockHistoryController extends Controller
{
    public function index()
    {
        $history = StockHistory::with('product')->latest()->paginate(15);
        return view('admin.inventory.history.index', compact('history'));
    }
}
