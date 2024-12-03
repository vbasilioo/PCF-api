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
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function serveds(){
        return $this->hasMany(Served::class);
    }

    public function requests(){
        return $this->hasMany(Request::class);
    }
}
