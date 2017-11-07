<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
  public function create(Request $request)
  {
    $comment = new Comment;
    $comment->post_id = $request->postId;
    $comment->user_id = Auth::id();
    $comment->comment = $request->comment;
    $comment->save();

    return 'Successfully commented';
  }
}
