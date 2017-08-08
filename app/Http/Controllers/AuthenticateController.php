<?php

namespace Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Mitra\User;
use Session;
use Auth;

class AuthenticateController extends Controller
{
    public function createRequest(Request $request)
    {
      //return $request->joinyear;
      $this->validate($request, [
        'campus' => 'required|digits_between:1,4',
        'course' => 'required|digits_between:1,4',
        'branch' => 'required|digits_between:1,3',
        'joinyear' => 'required',
        'leftyear' => 'required'
      ]);

      $user = User::find(Auth::id());
      $user->campus_id = $request->campus;
      $user->course_id = $request->course;
      $user->branch_id = $request->branch;
      $user->joining_year = $request->joinyear;
      $user->graduation_year = $request->leftyear;

      $user->save();

      Session::flash('info', 'Your manual approval request for verification has been received, we will revert on it within 1-2 days.');

      return redirect()->route('home');
    }
}
