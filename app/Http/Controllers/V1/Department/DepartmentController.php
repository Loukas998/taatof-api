<?php

namespace App\Http\Controllers\V1\Department;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Department\CreateDepartmentRequest;
use App\Http\Requests\V1\Department\UpdateDepartmentRequest;
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

        $department = Department::create($data);
        if(isset($request['images']))
        {
            $this->fileUploaderService->uploadMultipleFiles($department, $request['images'], 'images');
        }

        return ApiResponse::success(DepartmentResource::make($department), 'Department created');
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
                'title'       => $data['title'],
                'description' => $data['description'],
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
            return ApiResponse::success(DepartmentResource::make($department), 'Department updated');
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
