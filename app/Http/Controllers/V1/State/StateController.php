<?php

namespace App\Http\Controllers\V1\State;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Resources\V1\State\StateDashResource;
use App\Http\Resources\V1\State\StateResource;
use App\Models\State\State;

class StateController extends Controller
{
    public function index()
    {
        $accept_language = request()->header('Accept-Language');
        if($accept_language)
        {
            return ApiResponse::success(StateResource::collection(State::all()), 'States retrieved');
        }
        return ApiResponse::success(StateDashResource::collection(State::all()), 'States retrieved');
    }
}
