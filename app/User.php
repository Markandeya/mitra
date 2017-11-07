<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;

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
        return $this->hasMany('App\SocialProvider');
    }

    public function branch()
    {
      return $this->belongsTo('App\Branch');
    }

    public function campus()
    {
      return $this->belongsTo('App\Campus');
    }

    public function course()
    {
      return $this->belongsTo('App\Course');
    }

    public function posts()
    {
      return $this->hasMany('App\Post');
    }

    public function like()
    {
      return $this->hasMany('App\Like');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }

    public function getProfileImageAttribute($profileImage)
    {
      $id = $this->attributes['id'];

      //$link = url(asset('storage').'/'.$id.'/'.$profileImage);

      return asset(Storage::url('/'.$id.'/'.$profileImage));
    }
}
