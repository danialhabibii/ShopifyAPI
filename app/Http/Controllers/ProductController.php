<?php

namespace App\Http\Controllers;

use App\Action\Product\Comment\NewCommentAction;
use App\Action\Product\DestroyProductAction;
use App\Action\Product\NewProductAction;
use App\Action\Product\UpdateProductAction;
use App\Http\Requests\Product\Comment\NewCommentRequest;
use App\Http\Requests\Product\NewProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['create', 'update', 'destroy', 'newComment']);
    }

    public function index()
    {
        return $this->ok(
            ProductCollection::make(Product::paginate(10)),
        );
    }

    public function create(NewProductRequest $request, NewProductAction $newProductAction)
    {
        $this->authorize('access', $request->user());
        $newProduct = $newProductAction->execute($request->user(), $request->validated());
        return $this->created(
            ProductResource::make($newProduct),
        );
    }

    public function update(Product $product, UpdateProductRequest $request, UpdateProductAction $updateProductAction)
    {
        $this->authorize('access', $request->user());
        $updateProductAction->execute($product, $request->validated());
        return $this->ok(
            ProductResource::make($product)
        );
    }

    public function destroy(Product $product, Request $request, DestroyProductAction $destroyProductAction)
    {
        $this->authorize('access', $request->user());
        $destroyProductAction->execute($product);
        return $this->ok();
    }

    public function search(Product $product)
    {
        return $this->ok(
            ProductResource::make($product->load('category', 'comments')),
        );
    }

    public function newComment(Product $product, NewCommentRequest $request, NewCommentAction $newCommentAction)
    {
        $newCommentAction->execute($product, $request->user(), $request->validated());
        return $this->created();
    }
}
