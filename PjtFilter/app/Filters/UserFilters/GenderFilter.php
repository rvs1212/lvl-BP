<?php

namespace App\Filters\UserFilters;

use App\Contracts\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class GenderFilter implements FilterInterface
{
    public function apply(Builder $query, mixed $value): Builder
    {
        return $query->where('gender', $value);
    }
}
