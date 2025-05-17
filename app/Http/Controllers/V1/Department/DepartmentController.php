<?php

namespace App\Http\Controllers\V1\Department;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Department\CreateDepartmentRequest;
use App\Http\Requests\V1\Department\UpdateDepartmentRequest;
use App\Http\Resources\V1\Department\DepartmentDashResource;
use App\Http\Resources\V1\Department\DepartmentResource;
use App\Models\Department\Department;
use App\Services\FileUploaderService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
        return ApiResponse::success(DepartmentResource::collection(Department::all()), 'Departments retrieved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDepartmentRequest $request)
    {
        $data = $request->validated();

        $department = Department::create([
            'title'               => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar'],
            ],
            'description'         => [
                'en' => $data['description_en'],
                'ar' => $data['description_ar'],
            ],
            'groups_number'       => $data['groups_number'] ?? null,
            'participants_number' => $data['participants_number'] ?? null
        ]);

        if(isset($request['images']))
        {
            $this->fileUploaderService->uploadMultipleFiles($department, $request['images'], 'images');
        }

        return ApiResponse::success(DepartmentDashResource::make($department), 'Department created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return ApiResponse::success(DepartmentResource::make($department), 'Department retrieved');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        $data = $request->validated();
        $department = Department::findOrFail($id);
        if($department)
        {
            $department->update([
                'title'       => [
                    'en' => $data['title_en'],
                    'ar' => $data['title_ar'],
                ],
                'description' => [
                    'en' => $data['description_en'],
                    'ar' => $data['description_ar'],
                ],
                'groups_number'       => $data['groups_number'] ?? $department->groups_number,
                'participants_number' => $data['participants_number'] ?? $department->participants_number
            ]);

            if(isset($request['images']))
            {
                $this->fileUploaderService->uploadMultipleFiles($department, $request['images'], 'images');
            }

            if(isset($request['image_replacements']))
            {
                foreach($request['image_replacements'] as $image)
                {
                    $this->fileUploaderService->replaceFile($department, $image, $image['id'], 'images');
                }
            }
            return ApiResponse::success(DepartmentDashResource::make($department), 'Department updated');
        }
        return ApiResponse::notFound('Department not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return ApiResponse::success(null, 'Department deleted');
    }
}
