<?php

namespace Mitra\Traits;

use Mitra\Friendship;
use Mitra\User;

/**
 * friendships
 */
trait Friendable
{
  public function addFriend($user_requested_id)
  {
    $friendship = Friendship::create([
      'requester' => $this->id,
      'user_requested' => $user_requested_id
    ]);

    if($friendship)
    {
      return response()->json('ok', 200);
    }
    else
    {
      return response()->json('fail', 501);
    }
  }

  public function accept_friend($requester)
  {
    $friendship = Friendship::where('requester', $requester)->where('user_requested', $this->id)->first();

    if($friendship)
    {
      $friendship->update([ 'status' => 1]);

      return response()->json('ok', 200);
    }

    return response()->json('fail', 501);
  }

  public function friends()
  {
    $friends1 = array();

    $f1 = Friend::where('requester', $this->id)->where('status', 1)->get();

    foreach ($f1 as $friend)
    {
      array_push($friends1, User::find($friend->user_requested));
    }

    $friends2 = array();

    $f2 = Friend::where('user_requested', $this->id)->where('status', 1)->get();

    foreach ($f2 as $friend)
    {
      array_push($friends2, User::find($friend->requester));
    }

    return array_merge($friends1, $friends2);
  }
}




 ?>
