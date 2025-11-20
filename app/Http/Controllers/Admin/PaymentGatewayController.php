<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PaymentGateway;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    public function index()
    {
        $gateways = PaymentGateway::latest()->paginate(10);
        return view('admin.payment_gateways.index', compact('gateways'));
    }

    public function create()
    {
        return view('admin.payment_gateways.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'provider' => 'required',
            'active' => 'boolean',
        ]);

        PaymentGateway::create($request->only('name', 'provider', 'active'));

        return redirect()->route('admin.payment_gateways.index')->with('success', 'Payment Gateway created successfully.');
    }

    public function edit(PaymentGateway $paymentGateway)
    {
        return view('admin.payment_gateways.edit', compact('paymentGateway'));
    }

    public function update(Request $request, PaymentGateway $paymentGateway)
    {
        $request->validate([
            'name' => 'required',
            'provider' => 'required',
            'active' => 'boolean',
        ]);

        $paymentGateway->update($request->only('name', 'provider', 'active'));

        return redirect()->route('admin.payment_gateways.index')->with('success', 'Payment Gateway updated successfully.');
    }

    public function destroy(PaymentGateway $paymentGateway)
    {
        $paymentGateway->delete();

        return redirect()->route('admin.payment_gateways.index')->with('success', 'Payment Gateway deleted successfully.');
    }
}
