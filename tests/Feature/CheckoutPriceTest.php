<?php

namespace Tests\Feature;

use App\Support\CategoryMap;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

/**
 * Guards the one rule that matters for a money path: the order total and
 * line prices come from the database, never from the session cart, which the
 * client can influence.
 */
class CheckoutPriceTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_total_ignores_tampered_session_price(): void
    {
        $product = CategoryMap::model('keyboard')::create([
            'nama'  => 'Keyboard Uji',
            'harga' => 250000,
        ]);

        Session::put('cart', [
            'keyboard_' . $product->id => [
                'product_id' => $product->id,
                'category'   => 'keyboard',
                'name'       => 'Keyboard Uji',
                'price'      => 1, // attacker-supplied
                'qty'        => 2,
            ],
        ]);

        $response = $this->post(route('checkout.store'), [
            'nama'    => 'Budi',
            'telepon' => '081234567890',
            'alamat'  => 'Jl. Merino 12',
        ]);

        $order = \App\Models\Order::firstOrFail();

        $response->assertRedirect(route('order.show', $order->code));
        $this->assertSame(500000, (int) $order->total);
        $this->assertSame(250000, (int) $order->items->first()->harga);
    }
}
