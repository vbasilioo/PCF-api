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

    public function users(){
        return $this->hasMany(User::class);
    }

    public function serveds(){
        return $this->hasMany(Served::class);
    }
}
