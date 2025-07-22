<?php

namespace App\Http\Controllers\V1\Research;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\V1\Research\CreateResearchRequest;
use App\Http\Requests\V1\Research\UpdateResearchRequest;
use App\Http\Requests\V1\Research\BulkUpdateResearchRequest;
use App\Http\Resources\V1\Research\ResearchDashResource;
use App\Http\Resources\V1\Research\ResearchResource;
use App\Models\Research\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class ResearchController extends Controller
{
    public function index()
    {
        $accept_language = request()->header('Accept-Language');
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(ResearchResource::collection(Research::all()), 'Research retrieved');
        }
        return ApiResponse::success(ResearchDashResource::collection(Research::all()), 'Research retrieved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateResearchRequest $request)
    {
        $data = $request->validated();
        $research = Research::create([
            'title' => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar'],
            ],
        ]);
        return ApiResponse::success(ResearchDashResource::make($research, 'Research created'));
    }

    public function show($id)
    {
        $research = Research::findOrFail($id);
        $accept_language = request()->header('Accept-Language');
        if($accept_language && ($accept_language === 'en' || $accept_language === 'ar'))
        {
            return ApiResponse::success(ResearchResource::make($research), 'Research retrieved');
        }
        return ApiResponse::success(ResearchDashResource::make($research), 'Research retrieved');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResearchRequest $request, $id)
    {
        $data = $request->validated();
        $research = Research::findOrFail($id);
        $research->update([
            'title' => [
                'en' => $data['title_en'],
                'ar' => $data['title_ar'],
            ],
        ]);
        return ApiResponse::success(ResearchDashResource::make($research, 'Research updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $research = Research::findOrFail($id);
        $research->delete();
        return ApiResponse::success(null, 'Research retrieved');
    }

    public function bulk_update(BulkUpdateResearchRequest $request)
    {
        $data = $request->validated();
        $researches = $data['researches'];

        Research::query()->delete();
        DB::statement('ALTER TABLE research AUTO_INCREMENT = 1');

        foreach($researches as $researchData)
        {
            Research::create(
                [
                    'title' => [
                        'en' => $researchData['title_en'],
                        'ar' => $researchData['title_ar'],
                    ]
                ]
            );
        }

        // Return only the updated/created researches
        return ApiResponse::success(
            ResearchDashResource::collection(Research::all()), 'Researches updated');
    }
}