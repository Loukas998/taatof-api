<?php

namespace App\Http\Controllers\V1\Story;

use App\Http\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Story\CreateStoryRequest;
use App\Http\Requests\V1\Story\UpdateStoryRequest;
use App\Http\Requests\V1\Story\UpdateStoryStatusRequest;
use App\Http\Resources\V1\Story\StoryResource;
use App\Models\Story\Story;
use App\Notifications\UpdateStoryStatus;
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
            'user_id'            => $request->user('sanctum')->id,
            'state_id'           => $data['state_id'],
            'title'              => $data['title'],
            'date_of_submitting' => now(),
            'status'             => 'pending',
            'views'              => 0
        ]);

        $story->categories()->sync($data['categories']);

        if($data['type'] === 'blog')
        {
            $story->blogStory()->create([
                'summary'  => $data['summary'],
                'body'     => $data['body'],
            ]);
            $story->load('blogStory');
            if($request->has('image'))
            {
                $this->fileUploaderService->uploadSingleFile($story->blogStory, $request['image'], 'image');
            }
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
        if(auth('sanctum')->user())
        {
            $story->views += 1;
            $story->save();
        }
        
        if($story->blogStory)
        {
            $story->load('blogStory');
        }elseif($story->vlogStory)
        {
            $story->load('vlogStory');
        } 
        
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
            'state_id' => $data['state_id'],
            'title'    => $data['title'],
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
            if($request->has('image'))
            {
                $this->fileUploaderService->uploadSingleFile($story->blogStory, $request['image'], 'image');
            }
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
            if($request->has('video'))
            {
                $this->fileUploaderService->uploadSingleFile($story->blogStory, $request['video'], 'video');
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
        
        $story->delete();
        
        return ApiResponse::success(null, 'Story deleted successfully');
    }

    public function getStoriesByState()
    {
        $stateId = request()->query('stateId');
        $stories = Story::where('state_id', $stateId)->get();
        return ApiResponse::success(StoryResource::collection($stories), 'Stories retrieved successfully');
    }

    public function getStoriesByCategory()
    {
        $categoryId = request()->query('categoryId');
        $stories = Story::whereHas('categories', function($query) use($categoryId) {
            $query->where('category_story.category_id', $categoryId);
        })->get();

        return ApiResponse::success($stories, 'Stories retrieved');
    }

    public function getParticipantStories()
    {
        $user = request()->user('sanctum');
        $stories = $user->stories;
        return ApiResponse::success(StoryResource::collection($stories), 'Stories retrieved successfully');
    }

    public function updateStoryStatus(UpdateStoryStatusRequest $request, $id)
    {
        $data = $request->validated();
        $story = Story::findOrFail($id);
        $story->update([
            'status' => $data['status'],
            'note'   => $data['note'] ?? $story->note,
        ]);
        $story->participant->notify(new UpdateStoryStatus());
        return ApiResponse::success(StoryResource::make($story), 'Story status updated successfully');
    }

    public function getStoriesByParticipant()
    {
        $participantId = request()->query('participantId');
        $stories = Story::where('user_id', $participantId)->get();
        return ApiResponse::success(StoryResource::make($stories), 'Story status updated successfully');
    }
}
