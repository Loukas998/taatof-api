<?php

namespace App\Http\Controllers\V1\Home;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Home\CreateHomeRequest;
use App\Http\Requests\V1\Home\UpdateHomeRequest;
use App\Http\Resources\V1\Home\HomeDashResource;
use App\Http\Resources\V1\Home\HomeResource;
use App\Models\Home\Home;
use App\Services\FileUploaderService;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $home = Home::findOrFail(1);
        $accept_language = request()->header('Accept-Language');
        if($accept_language)
        {
            return ApiResponse::success(HomeResource::make($home), 'Home pages retrieved successfully');
        }
        return ApiResponse::success(HomeDashResource::make($home), 'Home pages retrieved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $home = Home::findOrFail($id);
        $accept_language = request()->header('Accept-Language');
        if($accept_language)
        {
            return ApiResponse::success(HomeResource::make($home), 'Home page content retrieved successfully');
        }
        return ApiResponse::success(HomeDashResource::make($home), 'Home page content retrieved successfully');
    }

    public function update(UpdateHomeRequest $request, $id)
    {
        $data = $request->validated();
        $home = Home::findOrFail($id);
        $home->update([
            'title'               => [
                'en' => $data['title_en'] ?? $home->getTranslation('title', 'en', false),
                'ar' => $data['title_ar'] ?? $home->getTranslation('title', 'ar', false),
            ],
            'subtitle'            => [
                'en' => $data['subtitle_en'] ?? $home->getTranslation('subtitle', 'en', false),
                'ar' => $data['subtitle_ar'] ?? $home->getTranslation('subtitle', 'ar', false),
            ],
            'trainings_number'    => $data['trainings_number'] ?? $home->trainings_number,
            'trainers_number'     => $data['trainers_number'] ?? $home->trainers_number,
            'stories_number'      => $data['stories_number'] ?? $home->stories_number,
            'life_groups_members' => $data['life_groups_members'] ?? $home->life_groups_members,
        ]);

        if(isset($request['images']))
        {

            $this->fileUploaderService->uploadMultipleFiles($home, $request['images'], 'slider_images');
        }

        
        if(isset($request['image_replacements']))
        {
            foreach($request['image_replacements'] as $image)
            {
                $this->fileUploaderService->replaceFile($home, $image, $image['id'], 'slider_images');
            }
        }
        
        return ApiResponse::success(HomeDashResource::make($home), 'Home page content updated successfully');
    }
}
