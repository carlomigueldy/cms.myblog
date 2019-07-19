<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillables = [
        'name'
    ];

    protected $dates = ['deleted_at'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
