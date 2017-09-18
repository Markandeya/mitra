<?php

namespace Mitra;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Post extends Model
{
    protected $fillable = ['user_id','content'];

    public $with = ['user'];

    public function user()
    {
      return $this->belongsTo('Mitra\User');
    }

    public function like()
    {
      return $this->hasMany('Mitra\Like');
    }
    // 
    // public function getCreatedAtAttribute($value)
    // {
    //   $dt = new Carbon($value);
    //   return $dt->diffForHumans();
    // }
}
