<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserDepartment;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function user_department():HasMany{
        return $this->hasMany(UserDepartment::class, 'department_id', 'id');
    }
}
