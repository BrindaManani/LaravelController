<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loginuser extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];
}
