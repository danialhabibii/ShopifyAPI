<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminCollection;
use App\Http\Resources\Admin\AdminResource;
use App\Http\Resources\Admin\ReportCollection;
use App\Http\Resources\Admin\ReportResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function report(Request $request)
    {
        $this->authorize('access', $request->user());
        return $this->ok(
            ReportCollection::make(Product::all()),
        );
    }

    public function categoryReport(Category $category, Request $request)
    {
        $this->authorize('access', $request->user());
        return $this->ok(
            ReportResource::make($category),
        );
    }
}
