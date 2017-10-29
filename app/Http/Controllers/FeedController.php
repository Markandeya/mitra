<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FeedController extends Controller
{
    public function feed()
    {
      $friends = Auth::user()->friends();

      $feed = array();

      foreach ($friends as $friend) {

        foreach ($friend->posts as $post) {

          array_push($feed, $post);

        }
      }

      $feed = collect($feed)->sortByDesc('created_at')->values()->all();

      return $feed;
    }
}
