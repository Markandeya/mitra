<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  protected $table = 'branches';

  public function users()
  {
    return $this->hasMany('App\User');
  }
}
