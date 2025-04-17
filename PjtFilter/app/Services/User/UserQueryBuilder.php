<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserQueryBuilder
{
    public function baseQuery(): Builder
    {
        return User::query()->with('languages');
    }

    public function onlyActive(): Builder
    {
        return $this->baseQuery()->where('is_active', true);
    }
}
