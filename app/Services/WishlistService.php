<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class WishlistService
{
    protected $sessionKey = 'wishlist';

    public function get()
    {
        return Session::get($this->sessionKey, []);
    }

    public function getProducts()
    {
        $ids = $this->get();
        if (empty($ids)) {
            return collect();
        }
        
        // Return products maintaining the order they were added (latest first)
        return Product::whereIn('id', $ids)
            ->get()
            ->sortBy(function ($product) use ($ids) {
                return array_search($product->id, $ids);
            })
            ->values();
    }

    public function add($productId)
    {
        $wishlist = $this->get();
        if (!in_array((int) $productId, $wishlist)) {
            // Add to the beginning of array so latest added show first
            array_unshift($wishlist, (int) $productId);
            Session::put($this->sessionKey, $wishlist);
        }
    }

    public function remove($productId)
    {
        $wishlist = $this->get();
        $wishlist = array_values(array_filter($wishlist, function ($id) use ($productId) {
            return (int) $id !== (int) $productId;
        }));
        Session::put($this->sessionKey, $wishlist);
    }

    public function toggle($productId)
    {
        if ($this->has($productId)) {
            $this->remove($productId);
            return false; // Removed
        } else {
            $this->add($productId);
            return true; // Added
        }
    }

    public function has($productId)
    {
        return in_array((int) $productId, $this->get());
    }

    public function count()
    {
        return count($this->get());
    }

    public function clear()
    {
        Session::forget($this->sessionKey);
    }
}
