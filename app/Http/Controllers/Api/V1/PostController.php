<?php

namespace App\Http\Controllers\Api\V1;

use PostDto;
use App\Models\Post;
use App\Requests\Api\PostRequest;
use App\Services\Post\PostService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PostResource;

class PostController extends Controller
{
    public function __construct(
        protected PostService $postService
    )
    {}

    public function store(PostRequest $request) : PostResource
    {
        $post = $this->postService->store(
            PostDto::fromApiRequest($request)
        );

        return PostResource::make(
            $post
        );
        
    }

    public function update(PostRequest $request, Post $post)
    {
        $post = $this->postService->update(
            $post,
            PostDto::fromApiRequest($request)
        );

        return PostResource::make(
            $post
        );
    }
}
