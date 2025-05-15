<?php

namespace App\Http\Controllers\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\User\CreateUserRequest;
use App\Http\Requests\V1\User\UpdateUserRequest;
use App\Http\Resources\V1\User\UserResource;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success(UserResource::collection(User::all()), 'Users retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return ApiResponse::success(UserResource::make($user), 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return ApiResponse::success(UserResource::make($user), 'User retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return ApiResponse::success(UserResource::make($user), 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->delete();
        return ApiResponse::success(null, 'User deleted successfully');
    }

    public function getParticipantByAuditor()
    {
        $auditorId = request()->query('auditorId');
        $participants = User::where('auditor_id', $auditorId)->get();
        return ApiResponse::success($participants, 'Participants retrieved successfully');
    }

    public function getAuditorParticipant()
    {
        $user = request()->user('sanctum');
        $participants = $user->participants();
        return ApiResponse::success($participants, 'Participants retrieved successfully');
    }
}
