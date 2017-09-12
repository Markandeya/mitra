<?php

namespace Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Mitra\Friendship;
use \Mitra\Notifications\NewFriendRequest;

class FriendController extends Controller
{
    public function check($id)
    {
      if (Auth::User()->is_friends_with($id) === 1)
      {
        return ["status" => "friends"];
      }

      if (Auth::User()->has_pending_friend_request_from($id) === 1)
      {
        return ["status" => "pending"];
      }

      if (Auth::User()->has_pending_friend_request_sent_to($id) === 1)
      {
        return ["status" => "waiting"];
      }

      return ["status" => 0];
    }

    public function addFriend($id)
    {
      $resp =  Auth::user()->addFriend($id);

      User::find($id)->notify( new NewFriendRequest(Auth::user()) );

      return $resp;
    }

    public function acceptFriend($id)
    {
      return Auth::user()->acceptFriend($id);
    }
}
