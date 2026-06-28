<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected $sessionKey = 'shopping_cart';

    public function get()
    {
        $cart = Session::get($this->sessionKey, []);
        $items = [];

        foreach ($cart as $key => $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                // Determine price directly from product pricing
                $price = $product->sale_price ?? $product->price;

                $items[] = [
                    'key' => $key,
                    'product_id' => $item['product_id'],
                    'product' => $product,
                    'name' => $product->name,
                    'image' => $product->image,
                    'quantity' => $item['quantity'],
                    'purity' => $item['purity'],
                    'price' => $price,
                    'subtotal' => $price * $item['quantity'],
                ];
            }
        }

        return $items;
    }

    public function add($productId, $quantity = 1, $purity = 'Standard')
    {
        $cart = Session::get($this->sessionKey, []);
        $key = $productId . '_' . $purity;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $quantity;
        } else {
            $cart[$key] = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'purity' => $purity,
            ];
        }

        Session::put($this->sessionKey, $cart);
    }

    public function update($productId, $purity, $quantity)
    {
        $cart = Session::get($this->sessionKey, []);
        $key = $productId . '_' . $purity;

        if (isset($cart[$key])) {
            if ($quantity <= 0) {
                unset($cart[$key]);
            } else {
                $cart[$key]['quantity'] = $quantity;
            }
            Session::put($this->sessionKey, $cart);
        }
    }

    public function remove($productId, $purity)
    {
        $cart = Session::get($this->sessionKey, []);
        $key = $productId . '_' . $purity;

        if (isset($cart[$key])) {
            unset($cart[$key]);
            Session::put($this->sessionKey, $cart);
        }
    }

    public function clear()
    {
        Session::forget($this->sessionKey);
    }

    public function totalAmount()
    {
        $items = $this->get();
        return array_sum(array_column($items, 'subtotal'));
    }

    public function totalItems()
    {
        $cart = Session::get($this->sessionKey, []);
        return array_sum(array_column($cart, 'quantity'));
    }
}
