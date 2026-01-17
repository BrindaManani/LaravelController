<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserPermission;
use App\Models\UserDepartment;
use App\Models\UserTeam;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

use App\Models\User;

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

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function user_code(): HasOne {
        return $this->hasOne(UserCode::class);
    }

    public function user_permissions(){
        return $this->belongsToMany(UserPermission::class, 'userdetail_id', 'id');
    }
    public function user_department():HasOne{
        return $this->hasOne(UserDepartment::class, 'userdetail_id', 'id');
    }
    public function user_team() : belongsTo{
        return $this->belongsTo(UserTeam::class, 'userdetail_id', 'id');
    }

    public function image(): MorphOne{
        return $this->morphOne(Image::class, 'imageable');
    }

    public function members(): MorphMany{
        return $this->morphMany(Image::class, 'imageable');
    }
}
