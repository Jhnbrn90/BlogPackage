<?php

namespace JohnDoe\BlogPackage\Traits;

use JohnDoe\BlogPackage\Models\Post;

trait HasPosts
{
    public function posts()
    {
        return $this->morphMany(Post::class, 'author');
  }
}