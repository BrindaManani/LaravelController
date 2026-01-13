<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDepartment extends Model
{
    protected $fillable = [
        'userdetail_id',
        'department_id',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
