<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\UserDepartment;
class Userdetail extends Model
{
    use HasFactory;

    /* protected $table = 'user_data';
    if the table name is different from model name we can manually define table name

    protected $primaryKey = 'data_id';
    specify a different column that serves as your model's primary key


    protected $attributes = [
        'gender' => 'male',
        'role' => 'user',
    ];
    If the field is missing: Laravel's $attributes property will automatically fill it.
   */

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'role',
        'status',
        'gender',
        'dob',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'permission',
        'avatar',
        'department',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function permissions(){
        return $this->hasMany(Permission::class, 'userdetail_id', 'id');
    }
    public function user_department(){
        return $this->hasOne(UserDepartment::class, 'userdetail_id', 'id');
    }
}
