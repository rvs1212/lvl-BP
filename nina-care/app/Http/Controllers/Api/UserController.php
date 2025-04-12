<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function index(Request $request)
    {
        $filteredQuery = $this->filterService->applyFilters($request->all());

        return UserResource::collection($filteredQuery->get());
    }
}
