<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'leader_id',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function served(){
        return $this->hasMany(Served::class);
    }

    public function request(){
        return $this->hasMany(Request::class);
    }
}
