<?php

namespace Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Mitra\User as User;
use Session;
use File;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unactivatedUsers = User::where('activated', '=', 0)->orderBy('updated_at', 'desc')->paginate(4);

        return view('admin.home')->with('users', $unactivatedUsers);
    }

    public function activate(Request $request)
    {
      $user = User::where('id', '=', $request->id);
      $user->update(['activated' => 1]);
      $user = $user->first();
      $path = public_storage_path($user);

      File::makeDirectory($path);

      Session::flash('success', 'Successfully activated user !');

      return back();
    }

    public function reject(Request $request)
    {
      $user = User::where('id', '=', $request->id);

      return 'Code to reject user';
    }
}
