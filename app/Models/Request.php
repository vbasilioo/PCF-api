<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
        'department_id',
    ];

    public function users(){
        return $this->hasOne(User::class);
    }

    public function departments(){
        return $this->hasOne(Department::class);
    }
}
