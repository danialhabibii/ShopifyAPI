<?php

namespace App\Action\Product;

use App\Models\Product;

class UpdateProductAction
{
    public function execute(Product $product, $data): void
    {
        $product->update($data);
    }
}
