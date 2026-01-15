<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class UserTeam extends Model
{
    protected $fillable = [
        'userdetail_id',
        'team_id'
    ];

    public function team(){
        return $this->belongsTo(Team::class);
    }
}
