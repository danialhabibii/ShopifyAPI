<?php

namespace App\Action\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;

class NewProductAction
{
    public function execute(User $user, array $data): Product
    {
        $randomSlug = Str::random(4);
        return Product::query()->create([
            'slug' => $randomSlug,
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'picture' => $data['picture'],
            'price' => $data['price'],
            'balance' => $data['balance'],
        ]);
    }
}
