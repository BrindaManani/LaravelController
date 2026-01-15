<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    protected $fillable = [
        'name',
    ];

    public function image(): MorphOne{
        return $this->morphOne(Image::class, 'imageable');
    }
}
