<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Financial extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'description',
        'amount',
        'type',
        'user_id'
    ];

    public function users(){
        return $this->hasOne(User::class);
    }
}
