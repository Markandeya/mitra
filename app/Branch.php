<?php

namespace Mitra;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  protected $table = 'branches';

  public function users()
  {
    return $this->hasMany('Mitra\User');
  }
}
