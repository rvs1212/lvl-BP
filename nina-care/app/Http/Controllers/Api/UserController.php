<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //return response()->json(['msg' => 'testing']);
        $users = User::with('languages')->get(); // eager load relationship
        return UserResource::collection($users); // return formatted response
    }
}
