<?php

namespace Mitra;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'provider_id', 'provider'
  ];

  public function user()
  {
      return $this->belongsTo('Mitra\User');
  }
}
