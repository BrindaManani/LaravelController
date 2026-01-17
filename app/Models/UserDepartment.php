<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Department;

class UserDepartment extends Model
{
    protected $fillable = [
        'userdetail_id',
        'department_id',
    ];

    public function department():BelongsTo{
        return $this->belongsTo(Department::class);
    }

    public function userdetail():BelongsTo{
        return $this->belongsTo(Userdetail::class, 'id', 'userdetail_id');
    }
}
