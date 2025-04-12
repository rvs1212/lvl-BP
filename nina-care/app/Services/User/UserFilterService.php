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

    protected UserQueryBuilder $queryBuilder;

    public function __construct(UserQueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }


    public function applyFilters(array $inputs): Builder
    {
        // $query = User::query()->with('languages'); // Start base query
        $query = $this->queryBuilder->baseQuery();
        
        foreach ($inputs as $key => $value) {
            if (isset($this->filters[$key]) && $value) {
                $filterClass = app($this->filters[$key]);
                $query = $filterClass->apply($query, $value);
            }
        }

        return $query;
    }
}
