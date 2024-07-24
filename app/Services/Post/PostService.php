<?php
namespace App\Services\Post;

use PostDto;
use App\Models\Post;

class PostService
{
    public function store(PostDto $postDto)
    {
        return Post::create([
            'title' => $postDto->title,
            'content' => $postDto->content,
            'source' => $postDto->source
        ]);
    }

    public function update(Post $post, PostDto $postDto)
    {
        return tap($post)->update([
            'title' => $postDto->title,
            'content' => $postDto->content,
        ]);
    }
}