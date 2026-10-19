<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'selectedProducts' => 'required|array',
            'selectedProducts.*' => 'string',
            'paymentMethod' => 'required|in:card,cash',
            'city' => 'required|string',
            'postal_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}$/',
            'age' => 'required|integer|min:14|max:140',
            'street' => 'required|string',
            'houseNumber' => 'required|string',
        ]);

        Order::create([
            'user_id' => auth()->id(),
            'selectedProducts' => implode(', ', $request->input('selectedProducts')),
            'paymentMethod' => $request->input('paymentMethod'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'age' => $request->input('age'),
            'street' => $request->input('street'),
            'houseNumber' => $request->input('houseNumber'),
        ]);

        Session::flash('order-success', 'Zamówienie zostało złożone.');

        return redirect()->route('ordersForm');
    }
}
