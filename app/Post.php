<?php

namespace Mitra;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','content'];

    public function user()
    {
      return $this->belongsTo('Mitra\User');
    }
}