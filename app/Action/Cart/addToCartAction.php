<?php

namespace App\Action\Cart;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;

class addToCartAction
{
    public function execute(User $user, Product $product, $data): Cart
    {
        $slug = Str::random(4);
        return Cart::query()->create([
            'slug' => $slug,
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $data['quantity'],
        ]);
    }
}
