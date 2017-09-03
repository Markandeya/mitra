<?php

namespace Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Mitra\User as User;
use Auth;
use Image;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile(Request $request)
    {
      $user = User::where('id', '=', $request->id)->first();

      return view('users.profile')->with('user', $user);
    }

    public function postProfile(Request $request)
    {
      $this->validate($request, [
       'name' => 'required|max:255',
       'designation' => 'required|max:255',
       'organization' => 'required|max:255',
       'city' => 'required|max:255',
       'image' => 'sometimes|image'
      ]);

      $user = Auth::user();
      $user->name = $request->name;
      $user->designation = $request->designation;
      $user->organization = $request->organization;
      $user->city = $request->city;

      //check if image was uploaded
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = time().'.'.$image->getClientOriginalExtension();
        $location = public_storage_path($user).'/'.$fileName;
        Image::make($image)->resize(400, 400)->save($location);
        $user->profile_image = $fileName;
      }

      $user->update();

      return back();
    }
}
