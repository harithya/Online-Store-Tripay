<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function all()
    {
        // session()->put('cart', []);
        return Product::whereIn('id', session('cart', []))->get();
    }

    public function store($request)
    {
        $cart = collect(session('cart', []))
            ->push($request->product_id)
            ->unique()
            ->values()
            ->toArray();

        session()->put('cart', $cart);
        return $cart;
    }

    public function destroy($id)
    {
        $cart = session('cart', []);
        $cart = array_values(array_filter($cart, fn($value) => $value != $id));
        session()->put('cart', $cart);
        return $cart;
    }
}
