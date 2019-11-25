<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * postが属するtagを取得
 */

class Post extends Model
{
    protected $fillable = ['name'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
