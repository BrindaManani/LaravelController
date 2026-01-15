<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserDepartment extends Model
{
    protected $fillable = [
        'userdetail_id',
        'department_id',
    ];

    public function department():HasMany{
        return $this->hasMany(Department::class);
    }
}
