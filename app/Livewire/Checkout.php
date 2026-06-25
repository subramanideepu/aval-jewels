<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CartService;
use Livewire\Component;

class Checkout extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $address = '';
    public $paymentMethod = 'whatsapp'; // 'whatsapp', 'simulated_card', 'simulated_upi'
    
    public $cartItems = [];
    public $total = 0;
    public $isSubmitted = false;
    public $placedOrder = null;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'phone' => 'required|string|min:10',
        'address' => 'required|string|min:10',
        'paymentMethod' => 'required|in:whatsapp,simulated_card,simulated_upi',
    ];

    public function mount(CartService $cartService)
    {
        $this->cartItems = $cartService->get();
        $this->total = $cartService->totalAmount();

        if (count($this->cartItems) === 0) {
            return redirect()->to(url('/collections'));
        }
    }

    public function placeOrder(CartService $cartService)
    {
        $this->validate();

        // 1. Create order record
        $order = Order::create([
            'customer_name' => $this->name,
            'customer_email' => $this->email,
            'customer_phone' => $this->phone,
            'shipping_address' => $this->address,
            'total_amount' => $this->total,
            'payment_method' => $this->paymentMethod,
            'status' => 'pending',
        ]);

        // 2. Add order items
        foreach ($this->cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'selected_purity' => $item['purity'],
            ]);
        }

        $this->placedOrder = $order;
        $this->isSubmitted = true;

        // 3. Handle checkout routes
        if ($this->paymentMethod === 'whatsapp') {
            // Build text message for WhatsApp
            $msg = "Hi House of Aval, I would like to place an order (Order #{$order->id}):\n\n";
            foreach ($this->cartItems as $item) {
                $msg .= "- {$item['quantity']}x {$item['name']} ({$item['purity']}) @ ₹" . number_format($item['price']) . "\n";
            }
            $msg .= "\nTotal Amount: ₹" . number_format($this->total) . "\n";
            $msg .= "Name: {$this->name}\n";
            $msg .= "Phone: {$this->phone}\n";
            $msg .= "Delivery Address: {$this->address}";

            $url = "https://wa.me/919876543210?text=" . urlencode($msg);
            
            // Clear cart
            $cartService->clear();
            $this->dispatch('cartCountUpdated');

            return redirect()->away($url);
        } else {
            // Clear cart
            $cartService->clear();
            $this->dispatch('cartCountUpdated');
        }
    }

    public function render()
    {
        return view('livewire.checkout.checkout')
            ->layout('layouts.app', [
                'title' => 'Checkout | AVAL JEWELS',
            ]);
    }
}
