<?php

namespace App\Http\Controllers\Cart;

use App\Action\Cart\addToCartAction;
use App\Action\Cart\DestroyCartItemsAction;
use App\Action\Cart\getCartItemsAction;
use App\Action\Cart\SingleDestroyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\addToCartRequest;
use App\Http\Resources\Cart\CartResource;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function addToCart(Product $product, addToCartRequest $request, addToCartAction $addToCartAction)
    {
        $addToCartAction->execute($request->user(), $product, $request->validated());
        return $this->ok();
    }


    public function viewCart(Request $request, getCartItemsAction $getCartItemsAction)
    {
        $cartItems = $getCartItemsAction->execute($request->user());
        return $this->ok(
            CartResource::make($cartItems->load('product')),
        );
    }

    public function singleDestroy(Request $request, Cart $cart, SingleDestroyAction $singleDestroyAction)
    {
        $singleDestroyAction->execute($request->user(), $cart);
        return $this->ok();
    }

    public function destroyCart(Request $request, DestroyCartItemsAction $destroyCartItemsAction)
    {
        $destroyCartItemsAction->execute($request->user());
        return $this->ok();
    }
}
