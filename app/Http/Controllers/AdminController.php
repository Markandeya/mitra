<?php

namespace Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Mitra\User as User;

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
        $unactivatedUsers = User::where('activated', '=', 0)->orderBy('updated_at', 'desc')->get();

        return view('admin.home')->with('users', $unactivatedUsers);
    }
}
