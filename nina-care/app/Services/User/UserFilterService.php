<?php

namespace App\Services\User;

use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Filters\UserFilters\GenderFilter;
use App\Filters\UserFilters\LocationFilter;

class UserFilterService
{
    protected array $filters = [
        'gender'   => GenderFilter::class,
        'location' => LocationFilter::class,
    ];

    public function applyFilters(array $inputs): Builder
    {
        $query = User::query()->with('languages'); // Start base query

        foreach ($inputs as $key => $value) {
            if (isset($this->filters[$key]) && $value) {
                $filterClass = app($this->filters[$key]); // Resolve with container
                $query = $filterClass->apply($query, $value); // Apply filter
            }
        }

        return $query;
    }
}
