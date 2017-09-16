<?php

namespace Mitra;

use Mitra\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'activated', 'profile_image', 'designation', 'city', 'organization'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socialProviders()
    {
        return $this->hasMany('Mitra\SocialProvider');
    }

    public function branch()
    {
      return $this->belongsTo('Mitra\Branch');
    }

    public function campus()
    {
      return $this->belongsTo('Mitra\Campus');
    }

    public function course()
    {
      return $this->belongsTo('Mitra\Course');
    }

    public function posts()
    {
      return $this->hasMany('Mitra\Post');
    }
}
