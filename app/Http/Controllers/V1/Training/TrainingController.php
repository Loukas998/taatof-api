<?php

namespace App\Http\Controllers\V1\Training;

use App\Http\Controllers\Controller;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTrainingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        //
    }
}
