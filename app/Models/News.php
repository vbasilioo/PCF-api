<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
