<?php

namespace App\Action\Cart;

use App\Models\Cart;
use App\Models\User;

class SingleDestroyAction
{
    public function execute(User $user, Cart $cart): void
    {
        $cart->delete();
    }
}
