<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserDepartment;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Department extends Model
{
    protected $fillable = [
        'department',
    ];
    public function members(): MorphMany{
        return $this->morphMany(Member::class, 'memberable');
    }
}
