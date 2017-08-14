<?php

namespace Mitra;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table = 'courses';

  public function users()
  {
    return $this->hasMany('Mitra\User');
  }
}
