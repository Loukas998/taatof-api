<?php

namespace App\Http\Controllers\V1\Project;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Project\CreateProjectRequest;
use App\Http\Requests\V1\Project\UpdateProjectRequest;
use App\Http\Requests\V1\Project\BulkUpdateProjectRequest;
use App\Http\Resources\V1\Project\ProjectDashResource;
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

    public function index()
    {
        $accept_language = request()->header('Accept-Language');
        if($accept_language)
        {
            return ApiResponse::success(ProjectResource::collection(Project::all()), 'Projects retrieved successfully');
        }
        return ApiResponse::success(ProjectDashResource::collection(Project::all()), 'Projects retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        $data = $request->validated();
        
        $project = Project::create([
            'title'                 => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar'],
            ],
            'home_description'     => [
                'en' => $data['home_description_en'],
                'ar' => $data['home_description_ar'],
            ],
            'detailed_description' => [
                'en' => $data['detailed_description_en'],
                'ar' => $data['detailed_description_ar']
            ],
        ]);

        if(isset($request['images']))
        {
            $this->fileUploaderService->uploadMultipleFiles($project, $request['images'],'images');
        } 
        return ApiResponse::success(ProjectDashResource::make($project), 'Project created successfully', 201);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        $accept_language = request()->header('Accept-Language');
        if($accept_language)
        {
            return ApiResponse::success(ProjectResource::make($project), 'Project retrieved successfully');
        }
        return ApiResponse::success(ProjectDashResource::make($project), 'Project retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        $data = $request->validated();

        $project = Project::findOrFail($id);
        
        $project->update([
            'title'                 => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar'],
            ],
            'home_description'     => [
                'en' => $data['home_description_en'],
                'ar' => $data['home_description_ar'],
            ],
            'detailed_description' => [
                'en' => $data['detailed_description_en'],
                'ar' => $data['detailed_description_ar']
            ],
        ]);

        if(isset($request['images']))
        {
            $this->fileUploaderService->uploadMultipleFiles($project, $request['images'],'images');
        }
        if(isset($request['image_replacements']))
        {
            foreach($request['image_replacements'] as $image)
            {
                $this->fileUploaderService->replaceFile($project, $image, $image['id'],'images');
            }
        }

        return ApiResponse::success(ProjectDashResource::make($project), 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->categories && $project->categories->count() > 0) {
            return ApiResponse::error('Cannot delete project with associated categories', 422);
        }
        
        $project->delete();
        
        return ApiResponse::success(null, 'Project deleted successfully');
    }

    public function bulk_update(BulkUpdateProjectRequest $request)
    {
        $data = $request->validated();
        $projects = $data['projects'];
        
        foreach($projects as $projectData)
        {
            // Use updateOrCreate instead of findOrFail + update
            $project = Project::updateOrCreate(
                ['id' => $projectData['id'] ?? null], // Find by ID if provided
                [
                    'title' => [
                        'en' => $projectData['title_en'],
                        'ar' => $projectData['title_ar'],
                    ],
                    'home_description' => [
                        'en' => $projectData['home_description_en'] ?? null,
                        'ar' => $projectData['home_description_ar'] ?? null,
                    ],
                    'detailed_description' => [
                        'en' => $projectData['detailed_description_en'] ?? null,
                        'ar' => $projectData['detailed_description_ar'] ?? null,
                    ]
                ]
            );
            
            if(isset($projectData['images']))
            {
                $this->fileUploaderService->uploadMultipleFiles($project, $projectData['images'], 'images');
            }
        }
    
        // Return only the updated/created projects
        return ApiResponse::success(ProjectDashResource::collection(Project::all()), 'Projects updated');
    }
}
