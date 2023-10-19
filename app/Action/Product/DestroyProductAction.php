<?php

namespace App\Action\Product;

use App\Models\Product;

class DestroyProductAction
{
    public function execute(Product $product): void
    {
        $product->delete();
    }
}
