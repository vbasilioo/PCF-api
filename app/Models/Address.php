<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'street',
        'city',
        'state',
        'zipcode',
        'country',
        'user_id'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function served(){
        return $this->hasMany(Served::class);
    }
}
