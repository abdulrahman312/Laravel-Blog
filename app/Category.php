<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // if you have other name then categories in DB then you need to manually tell it.
    protected $table = 'categories';

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
