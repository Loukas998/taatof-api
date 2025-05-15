<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();
        if($user && Hash::check($data['password'], $user->password))
        {
            $token = $user->createToken('auth-token')->plainTextToken;
            
            return ApiResponse::success([
                'token' => $token,
                'token_type' => 'Bearer'
            ], 'User logged in successfully');
        }
        
        return ApiResponse::error('Invalid credentials', 401);
    }
    
    public function logout(Request $request)
    {
        $request->user('sanctum')->currentAccessToken()->delete();
        
        return ApiResponse::success(null, 'User logged out successfully');
    }
}
