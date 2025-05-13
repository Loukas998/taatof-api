<?php

namespace App\Http\Controllers\V1\Story;

use App\Http\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Story\CreateStoryRequest;
use App\Http\Requests\V1\Story\UpdateStoryRequest;
use App\Http\Resources\V1\Story\StoryResource;
use App\Models\Story\Story;
use App\Services\FileUploaderService;
use Illuminate\Http\Request;

class StoryController extends Controller
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
        return ApiResponse::success(StoryResource::collection(Story::all(), 'Stories retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStoryRequest $request)
    {
        $data = $request->validated();
        $story = Story::create([
            'user_id'            => $data['user_id'],
            'state_id'           => $data['state_id'],
            'title'              => $data['title'],
            'date_of_submitting' => $data['date_of_submitting'],
            'note'               => $data['note'],
            'status'             => $data['status'],
        ]);


        if($data['type'] === 'blog')
        {
            $story->blogStory()->create([
                'summary'  => $data['summary'],
                'body'     => $data['body'],
            ]);
            $story->load('blogStory');
        }elseif($data['type'] === 'vlog')
        {
            $story->blogStory()->create([
                'caption'  => $data['caption'],
            ]);
            $story->load('vlogStory');
        }

        return ApiResponse::success(StoryResource::make($story), 'Story created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $story = Story::findOrFail($id);
        
        return ApiResponse::success(StoryResource::make($story), 'Story retrieved');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoryRequest $request, $id)
    {
        $data = $request->validated();

        $story = Story::findOrFail($id);
        $story->update([
            'user_id'  => $data['user_id'],
            'state_id' => $data['state_id'],
            'title'    => $data['title'],
            'note'     => $data['note'],
            'status'   => $data['status'],
        ]);
        
        if (isset($data['categories'])) {
            $story->categories()->sync($data['categories']);
        }
        
        if ($data['type'] === 'blog') {
            if ($story->blogStory) {
                $story->blogStory->update([
                    'summary' => $data['summary'] ?? $story->blogStory->summary,
                    'body' => $data['body'] ?? $story->blogStory->body,
                ]);
            } else {
                $story->blogStory()->create([
                    'summary' => $data['summary'],
                    'body' => $data['body'],
                ]);
            }
            $story->load('blogStory');
        } elseif ($data['type'] === 'vlog') {
            if ($story->vlogStory) {
                $story->vlogStory->update([
                    'caption' => $data['caption'] ?? $story->vlogStory->caption,
                ]);
            } else {
                $story->vlogStory()->create([
                    'caption' => $data['caption'],
                ]);
            }
            $story->load('vlogStory');
        }
        
        return ApiResponse::success(new StoryResource($story), 'Story updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        
        if ($story->blogStory) {
            $story->blogStory->delete();
        }
        
        if ($story->vlogStory) {
            $story->vlogStory->delete();
        }
        
        // Delete the story
        $story->delete();
        
        return ApiResponse::success(null, 'Story deleted successfully');
    }
}
