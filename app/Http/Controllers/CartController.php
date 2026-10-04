<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('user.cart', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $category = $request->input('category');
        $name = $request->input('name');
        $price = (int) $request->input('price');
        $image = $request->input('image');

        $cart = Session::get('cart', []);

        $key = $category . '_' . $id;

        if (isset($cart[$key])) {
            $cart[$key]['qty'] += 1;
        } else {
            $cart[$key] = [
                'id' => $id,
                'category' => $category,
                'name' => $name,
                'price' => $price,
                'qty' => 1,
                'image' => $image,
            ];
        }

        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $key)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$key])) {
            $qty = max(1, (int) $request->input('qty', 1));
            $cart[$key]['qty'] = $qty;
            Session::put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }

    public function remove($key)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$key])) {
            unset($cart[$key]);
            Session::put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Item removed');
    }

    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared');
    }
}
