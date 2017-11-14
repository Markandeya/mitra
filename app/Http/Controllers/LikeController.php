<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;

class LikeController extends Controller
{
    public function toggleLike(Request $request)
    {
      $userWhoLikes = Auth::id();
      $postId = $request->postId;

      $like = Like::where('post_id', $postId)->where('user_id', $userWhoLikes);
  
      //if already liked
      if($like->count() >= 1) {

        $like->delete();

        return 0;
      }
      else {

        $like = new Like();
        $like->user_id = $userWhoLikes;
        $like->post_id = $postId;
        $like->save();

        return 1;
      }
    }
}
