<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\Member;

class Team extends Model
{
    protected $fillable = [
        'name',
    ];

    public function members(): MorphMany{
        return $this->morphMany(Member::class, 'memberable');
    }
}
