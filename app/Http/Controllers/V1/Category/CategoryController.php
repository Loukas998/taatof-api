<?php

namespace App\Http\Controllers\V1\Category;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Category\CreateCategoryRequest;
use App\Http\Requests\V1\Category\UpdateCategoryRequest;
use App\Http\Requests\V1\Category\BulkUpdateCategoryRequest;
use App\Http\Resources\V1\Category\CategoryDashResource;
use App\Http\Resources\V1\Category\CategoryResource;
use App\Models\Category\Category;
use App\Services\FileUploaderService;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            return ApiResponse::success(CategoryResource::collection(Category::all()), 'Categories retrieved');
        }
        return ApiResponse::success(CategoryDashResource::collection(Category::all()), 'Categories retrieved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->validated();
        
        $category = Category::create([
            'project_id'  => $data['project_id'],
            'name'        => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar']
            ],
            'description' => [
                'en' => $data['description_en'] ?? null,
                'ar' => $data['description_ar'] ?? null,
            ],
        ]);

        if(isset($request['image']))
        {
            $this->fileUploaderService->uploadSingleFile($category, $request['image'], 'image');
        }
        
        return ApiResponse::success(CategoryDashResource::make($category), 'Category created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $accept_language = request()->header('Accept-Language');
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(CategoryResource::make($category), 'Category retrieved');
        }
        return ApiResponse::success(CategoryDashResource::make($category), 'Category retrieved');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);
        $category->update([
            'project_id'  => $data['project_id'],
            'name'        => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar']
            ],
            'description' => [
                'en' => $data['description_en'] ?? $category->getTranslation('description', 'en', false),
                'ar' => $data['description_ar'] ?? $category->getTranslation('description', 'ar', false),
            ],
        ]);
        
        if(isset($request['image']))
        {
            $this->fileUploaderService->uploadSingleFile($category, $request['image'], 'image');
        }

        return ApiResponse::success(CategoryDashResource::make($category), 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Check if category has related stories before deleting
        if ($category->stories && $category->stories->count() > 0) {
            return ApiResponse::error('Cannot delete category with associated stories', 422);
        }
        
        $category->delete();
        
        return ApiResponse::success(null, 'Category deleted successfully');
    }

    public function bulk_update(BulkUpdateCategoryRequest $request)
    {
        $data = $request->validated();
        $categories = $data['categories'];

        Category::truncate();
        
        foreach($categories as $categoryData)
        {
            $category = Category::create(
                [
                    'project_id' => $categoryData['project_id'],
                    'name' => [
                        'en' => $categoryData['name_en'],
                        'ar' => $categoryData['name_ar'],
                    ],
                    'description' => [
                        'en' => $categoryData['description_en'] ?? null,
                        'ar' => $categoryData['description_ar'] ?? null,
                    ]
                ]
            );
            
            if(isset($categoryData['image']))
            {
                $this->fileUploaderService->clearCollection($category, 'image');
                $this->fileUploaderService->uploadSingleFile($category, $categoryData['image'], 'image');
            }
        }
    
        return ApiResponse::success(CategoryDashResource::collection(Category::all()), 'Categories updated');
    }
}
