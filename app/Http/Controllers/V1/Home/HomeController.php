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
use Illuminate\Support\Facades\DB;

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
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
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
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(HomeResource::make($home), 'Home page content retrieved successfully');
        }
        return ApiResponse::success(HomeDashResource::make($home), 'Home page content retrieved successfully');
    }

    public function update(UpdateHomeRequest $request)
    {
        $data = $request->validated();
        
        Home::query()->delete();
        DB::statement('ALTER TABLE home AUTO_INCREMENT = 1');

        $home = Home::create([
            'title'               => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar']  
            ],
            'subtitle'            => [
                'en' => $data['subtitle_en'],  
                'ar' => $data['subtitle_ar']  
            ],
            'trainings_number'    => $data['trainings_number'],
            'trainers_number'     => $data['trainers_number'], 
            'stories_number'      => $data['stories_number'], 
            'life_groups_members' => $data['life_groups_members'], 
        ]);

        if(isset($request['images']))
        {
            $this->fileUploaderService->clearCollection($home, 'slider_images');
            $this->fileUploaderService->uploadMultipleFiles($home, $request['images'], 'slider_images');
        }
        
        return ApiResponse::success(HomeDashResource::make($home), 'Home page content updated successfully');
    }
}
