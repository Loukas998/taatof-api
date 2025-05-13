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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success(StateResource::collection(State::all()), 'States retrieved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
    }
}
