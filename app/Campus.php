<?php

namespace Mitra;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
  protected $table = 'campuses';

  public function users()
  {
    return $this->hasMany('Mitra\User');
  }
}
