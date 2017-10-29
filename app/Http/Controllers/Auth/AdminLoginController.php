<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admins');
    }

    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);

      if(Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
      {
        //intended location or dashboard
        return redirect()->intended(route('admin.dashboard'));
      }

      //failed then back to login with data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
