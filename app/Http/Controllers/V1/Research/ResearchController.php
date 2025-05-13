<?php

namespace App\Http\Controllers\V1\Research;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Research\CreateResearchRequest;
use App\Http\Requests\V1\Research\UpdateResearchRequest;
use App\Http\Resources\V1\Research\ResearchResource;
use App\Models\Research\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateResearchRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Research $research)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResearchRequest $request, Research $research)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Research $research)
    {
        //
    }
}

class ProjectController extends Controller
{
    //
}

class HomeController extends Controller
{
    //
}

class DepartmentController extends Controller
{
    //
}
