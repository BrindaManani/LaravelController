<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable = [
        'name',
        'guard',
    ];
    public function userdetails(){
        return $this->belongsToMany(Userdetail::class, 'user_permissions')->using(UserPermission::class);;
    }
}
