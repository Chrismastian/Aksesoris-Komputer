<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Support\CategoryMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);

        if ($cart === []) {
            return redirect()->route('cart.index')->with('success', 'Keranjang masih kosong.');
        }

        return view('user.checkout', [
            'cart'  => $cart,
            'total' => $this->total($cart),
        ]);
    }

    public function store(Request $request)
    {
        $cart = Session::get('cart', []);

        if ($cart === []) {
            return redirect()->route('cart.index');
        }

        $data = $request->validate([
            'nama'    => ['required', 'string', 'max:100'],
            'email'   => ['nullable', 'email', 'max:255'],
            'telepon' => ['required', 'string', 'max:30'],
            'alamat'  => ['required', 'string', 'max:1000'],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ]);

        // Re-read prices from the database. The session cart is a cache for
        // display; the order must not trust values the client could have set.
        $items = [];
        $total = 0;

        foreach ($cart as $key => $line) {
            $product = CategoryMap::model($line['category'])::find($line['product_id'] ?? 0);

            if (! $product) {
                // Product was deleted after it was added to the cart.
                unset($cart[$key]);
                continue;
            }

            $harga = (int) $product->harga;
            $qty   = (int) $line['qty'];

            $items[] = [
                'category'   => $line['category'],
                'product_id' => $product->id,
                'nama'       => $product->nama,
                'harga'      => $harga,
                'qty'        => $qty,
            ];

            $total += $harga * $qty;
        }

        if ($items === []) {
            Session::put('cart', $cart);

            return redirect()->route('cart.index')
                ->with('success', 'Semua produk di keranjang sudah tidak tersedia.');
        }

        $order = DB::transaction(function () use ($data, $items, $total) {
            $order = Order::create($data + ['total' => $total]);
            $order->items()->createMany($items);

            return $order;
        });

        Session::forget('cart');

        return redirect()->route('order.show', $order->code);
    }

    private function total(array $cart): int
    {
        return array_sum(array_map(
            fn ($line) => (int) $line['price'] * (int) $line['qty'],
            $cart
        ));
    }
}
