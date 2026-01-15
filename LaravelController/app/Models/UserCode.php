<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCode extends Model
{
    protected $fillable = [
        'userdetail_id',
        'code',
    ];

    public function user_detail(): BelongsTo {
        return $this->belongsTo(Userdetail::class);
    }
}
