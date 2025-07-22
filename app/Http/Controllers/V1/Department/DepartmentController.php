<?php

namespace App\Http\Controllers\V1\Department;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Department\CreateDepartmentRequest;
use App\Http\Requests\V1\Department\UpdateDepartmentRequest;
use App\Http\Requests\V1\Department\BulkUpdateDepartmentRequest;
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
        $accept_language = request()->header('Accept-Language');
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(DepartmentResource::collection(Department::all()), 'Departments retrieved');
        }
        return ApiResponse::success(DepartmentDashResource::collection(Department::all()), 'Departments retrieved');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        $accept_language = request()->header('Accept-Language');
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(DepartmentResource::make($department), 'Department retrieved');
        }
        return ApiResponse::success(DepartmentDashResource::make($department), 'Department retrieved');
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
                $this->fileUploaderService->clearCollection($department, 'images');
                $this->fileUploaderService->uploadMultipleFiles($department, $request['images'], 'images');
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

    public function bulk_update(BulkUpdateDepartmentRequest $request)
    {
        $data = $request->validated();
        $departments = $data['departments'];

        Department::truncate();
        
        foreach($departments as $departmentData)
        {
            $department = Department::create(
                [
                    'title' => [
                        'en' => $departmentData['title_en'],
                        'ar' => $departmentData['title_ar'],
                    ],
                    'description' => [
                        'en' => $departmentData['description_en'] ?? null,
                        'ar' => $departmentData['description_ar'] ?? null,
                    ],
                    'groups_number' => $departmentData['groups_number'] ?? null,
                    'participants_number' => $departmentData['participants_number'] ?? null
                ]
            );
            
            if(isset($departmentData['images']))
            {
                $this->fileUploaderService->clearCollection($department, 'images');
                $this->fileUploaderService->uploadMultipleFiles($department, $departmentData['images'], 'images');
            }
        }
    
        // Return only the updated/created departments
        return ApiResponse::success(
            DepartmentDashResource::collection(Department::all()), 'Departments updated'
        );
    }
}
