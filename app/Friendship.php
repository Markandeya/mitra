<?php

namespace Mitra;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable = ['requester', 'user_requested', 'status'];
}
