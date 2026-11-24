<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->status === 'admin') {
            $orders = Order::with('user:id,name,email')->orderBy('created_at', 'desc')->get();
        } else {
            $orders = Order::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->get();
        }
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'selectedProducts' => 'required|array',
            'selectedProducts.*' => 'string',
            'paymentMethod' => 'required|in:card,cash',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}$/',
            'age' => 'required|integer|min:14|max:140',
            'street' => 'required|string|max:255',
            'houseNumber' => 'required|string|max:50',
        ]);

        $order = Order::create([
            'user_id' => $request->user()->id,
            'selectedProducts' => implode(', ', $validated['selectedProducts']),
            'paymentMethod' => $validated['paymentMethod'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
            'age' => $validated['age'],
            'street' => $validated['street'],
            'houseNumber' => $validated['houseNumber'],
        ]);

        return response()->json($order, 201);
    }
}
