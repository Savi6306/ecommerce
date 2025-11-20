<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Transaction;
use App\Models\Seller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('seller')->latest()->paginate(15);
        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $sellers = Seller::all();
        return view('admin.transactions.create', compact('sellers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'seller_id' => 'required|exists:sellers,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|in:pending,completed,failed',
        ]);

        Transaction::create($request->all());

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction created successfully!');
    }

    public function edit(Transaction $transaction)
    {
        $sellers = Seller::all();
        return view('admin.transactions.edit', compact('transaction', 'sellers'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'seller_id' => 'required|exists:sellers,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|in:pending,completed,failed',
        ]);

        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction updated successfully!');
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('seller');
        return view('admin.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully!');
    }
}
