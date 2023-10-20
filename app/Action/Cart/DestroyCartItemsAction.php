<?php

namespace App\Action\Cart;

use App\Models\Cart;
use App\Models\User;

class DestroyCartItemsAction
{
    public function execute(User $user)
    {
        return Cart::where('user_id', $user->id)->delete();
    }
}
