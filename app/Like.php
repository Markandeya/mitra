<?php

namespace Mitra;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
      return $this->belongsTo('Mitra\User');
    }
    public function post()
    {
      $this->belongsTo('Mitra\Post');
    }
}
