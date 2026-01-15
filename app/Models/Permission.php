<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable = [
        'permission',
    ];
    // public function user_permissions(){
    //     return $this->belongsToMany(UserPermission::class, 'permission_id', 'id');
    // }
}
