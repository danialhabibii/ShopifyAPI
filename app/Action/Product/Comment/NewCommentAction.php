<?php

namespace App\Action\Product\Comment;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;

class NewCommentAction
{
    public function execute(Product $product, User $user, $data): Comment
    {
        return Comment::query()->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'comment' => $data['comment'],
        ]);
    }
}
