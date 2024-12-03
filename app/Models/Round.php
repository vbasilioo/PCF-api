<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Round extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'round_number',
        'user_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'round_users')
            ->withPivot('completed')
            ->withTimestamps();
    }
}
