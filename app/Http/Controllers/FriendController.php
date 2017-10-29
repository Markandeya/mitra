<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Friendship;
use App\Notifications\NewFriendRequest;
use App\Notifications\FriendRequestAccepted;


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
      $resp = Auth::user()->acceptFriend($id);

      User::find($id)->notify( new FriendRequestAccepted(Auth::user()) );

      return $resp;
    }
}
