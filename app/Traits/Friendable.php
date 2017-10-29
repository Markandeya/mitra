<?php

namespace App\Traits;

use App\Friendship;
use App\User;

/**
 * friendships
 */
trait Friendable
{
  public function addFriend($user_requested_id)
  {
    if($this->id === $user_requested_id)
    {
      return 0;
    }

    if($this->is_friends_with($user_requested_id) === 1)
    {
      return 'friends';
    }

    if($this->has_pending_friend_request_sent_to($user_requested_id))
    {
      return 'waiting';
    }

    if ($this->has_pending_friend_request_from($user_requested_id))
    {
      return 'pending';
    }

    $friendship = Friendship::create([
      'requester' => $this->id,
      'user_requested' => $user_requested_id
    ]);

    if($friendship)
    {
      return 1;
    }
    else
    {
      return 0;
    }
  }

  public function acceptFriend($requester)
  {
    $friendship = Friendship::where('requester', $requester)->where('user_requested', $this->id)->first();

    if($friendship)
    {
      $friendship->update([ 'status' => 1]);

      return 1;
    }

    return 0;
  }

  public function friends()
  {
    $friends1 = array();

    $f1 = Friendship::where('requester', $this->id)->where('status', 1)->get();

    foreach ($f1 as $friend)
    {
      array_push($friends1, User::find($friend->user_requested));
    }

    $friends2 = array();

    $f2 = Friendship::where('user_requested', $this->id)->where('status', 1)->get();

    foreach ($f2 as $friend)
    {
      array_push($friends2, User::find($friend->requester));
    }

    return array_merge($friends1, $friends2);
  }

  public function pending_friend_requests()
  {
    $friends = array();

    $f = Friendship::where('user_requested', $this->id)->where('status', 0)->get();

    foreach ($f as $value)
    {
      array_push($friends, User::find($value->requester));
    }

    return $friends;
  }

  public function pending_friend_requests_sent()
  {
    $friends = array();

    $f = Friendship::where('requester', $this->id)->where('status', 0)->get();

    foreach ($f as $value)
    {
      array_push($friends, User::find($value->user_requested));
    }

    return $friends;
  }

  public function friends_ids()
  {
    return collect($this->friends())->pluck('id')->toArray();
  }

  public function pending_friend_requests_ids()
  {
    return collect($this->pending_friend_requests())->pluck('id')->toArray();
  }

  public function pending_friend_requests_sent_ids()
  {
    return collect($this->pending_friend_requests_sent())->pluck('id')->toArray();
  }

  public function is_friends_with($id)
  {

    if(in_array($id, $this->friends_ids()))
      return 1;
    else
      return 0;
  }

  public function has_pending_friend_request_from($id)
  {
    if(in_array($id, $this->pending_friend_requests_ids()))
      return 1;
    else
      return 0;
  }

  public function has_pending_friend_request_sent_to($id)
  {
    if(in_array($id, $this->pending_friend_requests_sent_ids()))
      return 1;
    else
      return 0;
  }
}




 ?>
