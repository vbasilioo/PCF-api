<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Served extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'date_of_birth',
        'department_id',
        'address_id'
    ];

    public function department(){
        return $this->hasOne(Department::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }
}
