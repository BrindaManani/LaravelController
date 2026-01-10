<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
    use HasFactory;

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
        'pincode',
        'avatar',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
