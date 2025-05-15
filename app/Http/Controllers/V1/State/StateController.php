<?php

namespace App\Http\Controllers\V1\State;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\State\CreateStateRequest;
use App\Http\Requests\V1\State\UpdateStateRequest;
use App\Http\Resources\V1\State\StateResource;
use App\Models\State\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        return ApiResponse::success(StateResource::collection(State::all()), 'States retrieved');
    }
}
