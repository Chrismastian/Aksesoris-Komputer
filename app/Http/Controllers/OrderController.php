<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function show(string $code)
    {
        $order = Order::with('items')->where('code', $code)->firstOrFail();

        return view('user.order', compact('order'));
    }
}
