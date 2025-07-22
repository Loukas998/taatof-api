<?php

namespace App\Http\Controllers\V1\Manual;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Manual\CreateManualRequest;
use App\Http\Requests\V1\Manual\UpdateManualRequest;
use App\Http\Requests\V1\Manual\BulkUpdateManualRequest;
use App\Http\Resources\V1\Manual\ManualDashResource;
use App\Http\Resources\V1\Manual\ManualResource;
use App\Models\Manual\Manual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManualController extends Controller
{
    public function index()
    {
        $accept_language = request()->header('Accept-Language');
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(ManualResource::collection(Manual::all()), 'Manuals retrieved');
        }
        return ApiResponse::success(ManualDashResource::collection(Manual::all()), 'Manuals retrieved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateManualRequest $request)
    {
        $data = $request->validated();

        $manual = Manual::create([
            'title' => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar']
            ],
            'description' => [
                'en' => $data['description_en'],
                'ar' => $data['description_ar'],
            ]
        ]);

        return ApiResponse::success(ManualDashResource::make($manual, 'Manual created'));
    }

    public function show($id)
    {
        $manual = Manual::findOrFail($id);
        $accept_language = request()->header('Accept-Language');
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(ManualResource::make($manual), 'Manual retrieved');
        }
        return ApiResponse::success(ManualDashResource::make($manual), 'Manual retrieved');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManualRequest $request, $id)
    {
        $data = $request->validated();
        $manual = Manual::findOrFail($id);
        $manual->update([
            'title' => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar']
            ],
            'description' => [
                'en' => $data['description_en'] ?? $manual->getTranslation('description', 'en', false),
                'ar' => $data['description_ar'] ?? $manual->getTranslation('description', 'ar', false),
            ]
        ]);
        return ApiResponse::success(ManualDashResource::make($manual, 'Manual updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $manual = Manual::findOrFail($id);
        $manual->deleted();
        return ApiResponse::success(null, 'Manual updated');
    }

    public function bulk_update(BulkUpdateManualRequest $request)
    {
        $data = $request->validated();
        $manuals = $data['manuals'];

        Manual::query()->delete();
        DB::statement('ALTER TABLE manuals AUTO_INCREMENT = 1');

        foreach($manuals as $manualData)
        {
            Manual::create(
                [
                    'title' => [
                        'en' => $manualData['title_en'],
                        'ar' => $manualData['title_ar'],
                    ],
                    'description' => [
                        'en' => $manualData['description_en'] ?? null,
                        'ar' => $manualData['description_ar'] ?? null,
                    ]
                ]
            );
        }
    
        return ApiResponse::success(ManualDashResource::collection(Manual::all()), 'Manuals updated');
    }
}
