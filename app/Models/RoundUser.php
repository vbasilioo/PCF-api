<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoundUser extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'round_id',
        'user_id',
        'completed'
    ];
}
