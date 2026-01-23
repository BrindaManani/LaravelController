<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   protected $fillable = [
    'group',
    'name',
    'payload'
   ];
   protected $casts = [
    'payload' => 'json',
];
}
