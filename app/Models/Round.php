<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Round extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'quantity_rounds',
        'user_id'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
