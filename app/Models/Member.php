<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Member extends Model
{
    protected $fillable = [
        'member_name',
        'memberable_type',
        'memberable_id',
    ];
    
    public function memberable():MorphTo{
        return $this->morphTo();
    }
}
