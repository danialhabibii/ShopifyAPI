<?php

namespace App\Scopes\Product;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class balance implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('balance', '>', 0);
    }
}
