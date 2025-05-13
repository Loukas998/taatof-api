<?php

namespace App\Http\Controllers\V1\Project;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Project\CreateProjectRequest;
use App\Http\Requests\V1\Project\UpdateProjectRequest;
use App\Http\Resources\V1\Project\ProjectResource;
use App\Models\Project\Project;
use App\Services\FileUploaderService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $fileUploaderService;
    public function __construct(FileUploaderService $fileUploaderService)
    {
        $this->fileUploaderService = $fileUploaderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success(ProjectResource::collection(Project::all()), 'Projects retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        $data = $request->validated();
        
        $project = Project::create([
            'name'                 => $data['name'],
            'home_description'     => $data['description'],
            'detailed_description' => $data['status'],
        ]);
        
        return ApiResponse::success(ProjectResource::make($project), 'Project created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return ApiResponse::success(ProjectResource::make($project), 'Project retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        
        $project->update([
            'name'                 => $data['name'] ?? $data['name'],
            'home_description'     => $data['home_description'] ?? $data['home_description'],
            'detailed_description' => $data['detailed_description'] ?? $data['detailed_description'],
        ]);
        
        return ApiResponse::success(ProjectResource::make($project), 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Check if project has related categories before deleting
        if ($project->categories && $project->categories->count() > 0) {
            return ApiResponse::error('Cannot delete project with associated categories', 422);
        }
        
        $project->delete();
        
        return ApiResponse::success(null, 'Project deleted successfully');
    }
}
