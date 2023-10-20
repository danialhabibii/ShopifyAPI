<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReportCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'reports' => $this->collection->count()
        ];
    }
}
