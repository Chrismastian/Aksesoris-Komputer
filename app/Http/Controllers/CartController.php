<?php

namespace App\Http\Controllers;

use App\Support\CategoryMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        return view('user.cart', ['cart' => $this->cart()]);
    }

    public function add(Request $request, string $category, int $id)
    {
        // Price, name and image are read from the database, never from the form.
        // The request only says which product was clicked.
        $product = CategoryMap::model($category)::findOrFail($id);

        $cart = $this->cart();
        $key = $category . '_' . $id;

        $cart[$key] = [
            'product_id' => $product->id,
            'category'   => $category,
            'name'       => $product->nama,
            'price'      => (int) $product->harga,
            'image'      => $product->gambar,
            'qty'        => ($cart[$key]['qty'] ?? 0) + 1,
        ];

        Session::put('cart', $cart);

        return redirect()->back()->with('success', $product->nama . ' ditambahkan ke keranjang.');
    }

    public function update(Request $request, string $key)
    {
        $cart = $this->cart();

        if (isset($cart[$key])) {
            $cart[$key]['qty'] = max(1, min(99, (int) $request->input('qty', 1)));
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function remove(string $key)
    {
        $cart = $this->cart();
        unset($cart[$key]);
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    public function clear()
    {
        Session::forget('cart');

        return redirect()->route('cart.index')->with('success', 'Keranjang dikosongkan.');
    }

    private function cart(): array
    {
        return Session::get('cart', []);
    }
}
