<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $details = OrderDetail::with('game', 'order')->get();
        return response()->json($details);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'game_id' => 'required|exists:games,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        $detail = OrderDetail::create($validated);
        return response()->json($detail, 201);
    }

    public function show(OrderDetail $orderDetail)
    {
        $orderDetail->load('game', 'order');
        return response()->json($orderDetail);
    }

    public function update(Request $request, OrderDetail $orderDetail)
    {
        $validated = $request->validate([
            'quantity' => 'integer|min:1',
            'price' => 'numeric',
        ]);

        $orderDetail->update($validated);
        return response()->json($orderDetail);
    }

    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return response()->json(['message' => 'Order detail deleted']);
    }
}
