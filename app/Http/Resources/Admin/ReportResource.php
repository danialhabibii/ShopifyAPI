<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'report' => [
                'category' => $this->resource->title,
                'products' => $this->resource->products->count(),
            ]
        ];
    }
}
