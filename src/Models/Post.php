<?php

namespace JohnDoe\BlogPackage\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->morphTo();
    }
}