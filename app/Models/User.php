<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Userdetail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'role_id',
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
        'is_admin',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function user_detail(): HasOne {
        return $this->hasOne(Userdetail::class, 'email', 'email');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function user_code(): HasOne
    {
        return $this->hasOne(UserCode::class, 'userdetail_id', 'id');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'user_permissions', 'userdetail_id', 'permission_id')->withPivot(['userdetail_id', 'permission_id']);
    }

    public function user_department(): HasOne
    {
        return $this->hasOne(UserDepartment::class, 'userdetail_id', 'id');
    }

    public function user_team(): belongsTo
    {
        return $this->belongsTo(UserTeam::class, 'userdetail_id', 'id');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function members(): MorphMany
    {
        return $this->morphMany(Member::class, 'memberable');
    }
}
