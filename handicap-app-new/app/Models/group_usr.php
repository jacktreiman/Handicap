<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_usr extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'group_id'
    ];
}
