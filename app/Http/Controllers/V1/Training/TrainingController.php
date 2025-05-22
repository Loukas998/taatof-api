<?php

namespace App\Http\Controllers\V1\Training;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Training\BulkUpdateTrainingRequest;
use App\Http\Requests\V1\Training\CreateTrainingRequest;
use App\Http\Requests\V1\Training\UpdateTrainingRequest;
use App\Http\Resources\V1\Training\TrainingDashResource;
use App\Http\Resources\V1\Training\TrainingResource;
use App\Models\Training\Training;
use App\Services\FileUploaderService;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    private $fileUploaderService;
    public function __construct(FileUploaderService $fileUploaderService)
    {
        $this->fileUploaderService = $fileUploaderService;
    }

    public function index()
    {
        $accept_language = request()->header('Accept-Language');
        if($accept_language && $accept_language === 'en' && $accept_language === 'ar')
        {
            return ApiResponse::success(TrainingResource::collection(Training::all()), 'Trainings retrieved');
        }
        return ApiResponse::success(TrainingDashResource::collection(Training::all()), 'Trainings retrieved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTrainingRequest $request)
    {
        $data = $request->validated();
        $training = Training::create([
            'title'       => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar'],
            ],
            'description' => [
                'en' => $data['description_en'],
                'ar' => $data['description_ar'],
            ],
            'location'    => [
                'en' => $data['location_en'],
                'ar' => $data['location_ar'],
            ]
        ]);
        if(isset($request['image']))
        {
            $this->fileUploaderService->uploadSingleFile($training, $request['image'], 'image');
        }

        return ApiResponse::success(TrainingDashResource::make($training), 'Training created');
    }

    public function show($id)
    {
        $training = Training::findOrFail($id);
        $accept_language = request()->header('Accept-Language');
        if($accept_language)
        {
            return ApiResponse::success(TrainingResource::make($training), 'Training retrieved');
        }
        return ApiResponse::success(TrainingDashResource::make($training), 'Training retrieved');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingRequest $request, $id)
    {
        $data = $request->validated();

        $training = Training::findOrFail($id);
        $training->update([
            'title'       => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar'],
            ],
            'description' => [
                'en' => $data['description_en'] ?? $training->getTranslation('description', 'en', false),
                'ar' => $data['description_ar'] ?? $training->getTranslation('description', 'ar', false),
            ]
        ]);

        if(isset($request['image']))
        {
            $this->fileUploaderService->uploadSingleFile($training, $request['image'], 'image');
        }

        return ApiResponse::success(TrainingDashResource::make($training), 'Training updated');
    }

    public function bulk_update(BulkUpdateTrainingRequest $request)
    {
        $data = $request->validated();
        $trainings = $data['trainings'];
        foreach($trainings as $trainingData)
        {
            $training = Training::updateOrCreate(
                ['id' => $trainingData['id'] ?? null], // Find by ID if provided
                [
                    'title' => [
                        'en' => $trainingData['title_en'],
                        'ar' => $trainingData['title_ar'],
                    ],
                    'description' => [
                        'en' => $trainingData['description_en'] ?? null,
                        'ar' => $trainingData['description_ar'] ?? null,
                    ],
                    'location' => [
                        'en' => $trainingData['location_en'] ?? null,
                        'ar' => $trainingData['location_ar'] ?? null,
                    ]
                ]
            );
            if(isset($trainingData['image']))
            {
                $this->fileUploaderService->uploadSingleFile($training, $trainingData['image'], 'image');
            }
        }


        return ApiResponse::success(TrainingDashResource::collection(Training::all()), 'Training updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();
        return ApiResponse::success(null, 'Training deleted');
    }
}
