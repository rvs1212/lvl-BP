<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterUsersRequest;
use App\Http\Resources\UserResource;
use App\Services\User\UserFilterService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserFilterService $filterService;

    public function __construct(UserFilterService $filterService)
    {
        $this->filterService = $filterService;
    }
    
    /**
     * Handle request to get all users, optionally filtered by gender, location, etc.
     * Returns a formatted collection via UserResource.
     */

    public function getUsers(FilterUsersRequest $request)
    {
        $filteredQuery = $this->filterService->applyFilters($request->validated());
        return UserResource::collection($filteredQuery->get());
    }
}
