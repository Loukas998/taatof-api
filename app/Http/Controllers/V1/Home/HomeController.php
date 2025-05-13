<?php

namespace App\Http\Controllers\V1\Home;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Home\CreateHomeRequest;
use App\Http\Requests\V1\Home\UpdateHomeRequest;
use App\Http\Resources\V1\Home\HomeResource;
use App\Models\Home\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        return ApiResponse::success(HomeResource::make($home), 'Home page content retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        $data = $request->validated();
        
        $home->update([
            'title'               => $data['title'] ?? $home->title,
            'subtitle'            => $data['subtitle'] ?? $home->subtitle,
            'trainings_number'    => $data['trainings_number'] ?? $home->trainings_number,
            'trainers_number'     => $data['trainers_number'] ?? $home->trainers_number,
            'stories_number'      => $data['stories_number'] ?? $home->stories_number,
            'life_groups_members' => $data['life_groups_members'] ?? $home->life_groups_members,
        ]);
        
        return ApiResponse::success(HomeResource::make($home), 'Home page content updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
