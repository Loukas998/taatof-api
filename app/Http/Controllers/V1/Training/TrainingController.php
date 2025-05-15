<?php

namespace App\Http\Controllers\V1\Training;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Training\CreateTrainingRequest;
use App\Http\Requests\V1\Training\UpdateTrainingRequest;
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success(TrainingResource::collection(Training::all()), 'Trainings retrieved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTrainingRequest $request)
    {
        $data = $request->validated();

        $training = Training::create($data);
        if(isset($request['image']))
        {
            $this->fileUploaderService->uploadSingleFile($training, $request['image'], 'image');
        }

        return ApiResponse::success(TrainingResource::make($training), 'Training created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $training = Training::findOrFail($id);
        return ApiResponse::success(TrainingResource::make($training), 'Training retrieved');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingRequest $request, $id)
    {
        $data = $request->validated();

        $training = Training::findOrFail($id);
        $training->update([
            'title'       => $data['title'],
            'description' => $data['description']
        ]);

        if(isset($request['image']))
        {
            $this->fileUploaderService->uploadSingleFile($training, $request['image'], 'image');
        }

        return ApiResponse::success(TrainingResource::make($training), 'Training updated');
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
