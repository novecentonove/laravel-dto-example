<?php

use PostSource;
use App\Requests\Api\PostRequest as AiPostRequest;
use App\Requests\App\PostRequest as AppPostRequest;

class PostDto
{
    public function __construct(
      public readonly string $title,
      public readonly string $content,
      public readonly PostSource $source
    )
    {}

    public static function fromAppRequest(AppPostRequest $request)
    {
      return new self(
        title: $request->validated('title'),
        content: $request->validated('body'),
        source: PostSource::App
      );
    }

    public static function fromApiRequest(AiPostRequest $request)
    {
      return new self(
        title: $request->validated('payload.post.title'),
        content: $request->validated('payload.post.body'),
        source: PostSource::Api
      );
    }
}