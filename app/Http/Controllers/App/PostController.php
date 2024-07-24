<?php

namespace App\Http\Controllers\App;

use PostSource;
use App\Models\Post;
use App\Requests\App\PostRequest;
use App\Services\Post\PostService;
use App\Http\Controllers\Controller;
use App\Http\Resources\App\PostResource;
use PostDto;

class PostController extends Controller
{
    public function __construct(
        protected PostService $postService
    )
    {}

    public function store(PostRequest $request) : PostResource
    {
        $post = $this->postService->store(
            PostDto::fromAppRequest($request)
        );

        return PostResource::make(
            $post
        );
    }

    public function update(PostRequest $request, Post $post)
    {
        $post = $this->postService->update(
            $post,
            PostDto::fromAppRequest($request)
        );

        return PostResource::make(
            $post
        );
    }
}
