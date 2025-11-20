<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Refund;
use App\Models\Admin\Transaction;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function index()
    {
        $refunds = Refund::with('transaction')->latest()->paginate(10);
        return view('admin.refunds.index', compact('refunds'));
    }

    public function create()
    {
        $transactions = Transaction::all();
        return view('admin.refunds.create', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'amount' => 'required|numeric|min:0.01',
            'reason' => 'nullable|string|max:255',
        ]);

        Refund::create($request->only('transaction_id', 'amount', 'reason'));

        return redirect()->route('admin.refunds.index')->with('success', 'Refund created successfully.');
    }

    public function edit(Refund $refund)
    {
        $transactions = Transaction::all();
        return view('admin.refunds.edit', compact('refund', 'transactions'));
    }

    public function update(Request $request, Refund $refund)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'amount' => 'required|numeric|min:0.01',
            'reason' => 'nullable|string|max:255',
            'status' => 'required|string',
        ]);

        $refund->update($request->only('transaction_id', 'amount', 'reason', 'status'));

        return redirect()->route('admin.refunds.index')->with('success', 'Refund updated successfully.');
    }

    public function destroy(Refund $refund)
    {
        $refund->delete();
        return back()->with('success', 'Refund deleted successfully.');
    }
}
