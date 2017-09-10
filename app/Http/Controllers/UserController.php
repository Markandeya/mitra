<?php

namespace Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Mitra\User as User;
use Auth;
use Image;
use File;
use Illuminate\Support\Collection as Collection;
use Session;

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
      if(Auth::user()->activated == 0)
        return view('home');

      $user = User::where('id', '=', $request->id)->first();

      return view('users.profile')->with('user', $user);
    }

    public function postProfile(Request $request)
    {
      if(Auth::user()->activated == 0)
        return view('home');

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

        $oldLocation = public_storage_path($user).'/'.$user->profile_image;

        $image = $request->file('image');
        $fileName = time().'.'.$image->getClientOriginalExtension();
        $location = public_storage_path($user).'/'.$fileName;
        Image::make($image)->resize(400, 400)->save($location);
        $user->profile_image = $fileName;

        //delete old profile image
        File::delete($oldLocation);
      }

      $user->update();

      Session::flash('success', 'Profile updated.');

      return back();
    }

    public function amritians(Request $request)
    {
        if(Auth::user()->activated == 0)
        return view('home');

        $name = $request->input('name');

        return view('users.amritians')->with('name', $name);
    }
}
