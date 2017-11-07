<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Post extends Model
{
    protected $fillable = ['user_id','content'];

    public $with = ['user', 'comments'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function like()
    {
      return $this->hasMany('App\Like');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
    //
    // public function getCreatedAtAttribute($value)
    // {
    //   $dt = new Carbon($value);
    //   return $dt->diffForHumans();
    // }
}
