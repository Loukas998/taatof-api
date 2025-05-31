<?php

namespace App\Http\Controllers\V1\State;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\State\BulkUpdateStateRequest;
use App\Http\Resources\V1\State\StateDashResource;
use App\Http\Resources\V1\State\StateResource;
use App\Models\State\State;
use App\Services\FileUploaderService;

class StateController extends Controller
{
    private $fileUploaderService;
    public function __construct(FileUploaderService $fileUploaderService)
    {
        $this->fileUploaderService = $fileUploaderService;
    }


    public function index()
    {
        $accept_language = request()->header('Accept-Language');
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(StateResource::collection(State::all()), 'States retrieved');
        }
        return ApiResponse::success(StateDashResource::collection(State::all()), 'States retrieved');
    }


    public function bulk_update(BulkUpdateStateRequest $request)
    {
        $data = $request->validated();
        $states = $data['states'];

        State::truncate();

        foreach($states as $stateData)
        {
            $state = State::create([
               'name' => [
                    'en' => $stateData['name_en'],
                    'ar' => $stateData['name_ar'],
                ],
            ]);

            if(isset($categoryData['image']))
            {
                $this->fileUploaderService->clearCollection($state, 'image');
                $this->fileUploaderService->uploadSingleFile($state, $stateData['image'], 'image');
            }
        }
        return ApiResponse::success(null, 'States updated');
    }
}
