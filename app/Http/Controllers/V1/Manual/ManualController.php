<?php

namespace App\Http\Controllers\V1\Manual;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Manual\CreateManualRequest;
use App\Http\Requests\V1\Manual\UpdateManualRequest;
use App\Http\Resources\V1\Manual\ManualResource;
use App\Models\Manual\Manual;
use Illuminate\Http\Request;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success(ManualResource::collection(Manual::all(), 'Manuals retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateManualRequest $request)
    {
        $data = $request->validated();

        $manual = Manual::create($data);

        return ApiResponse::success(ManualResource::make($manual, 'Manual created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $manual = Manual::findOrFail($id);
        return ApiResponse::success(ManualResource::make($manual, 'Manual retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManualRequest $request, $id)
    {
        $data = $request->validated();
        $manual = Manual::findOrFail($id);
        $manual->update($data);
        return ApiResponse::success(ManualResource::make($manual, 'Manual updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $manual = Manual::findOrFail($id);
        $manual->deleted();
        return ApiResponse::success(ManualResource::make($manual, 'Manual updated'));
    }
}
