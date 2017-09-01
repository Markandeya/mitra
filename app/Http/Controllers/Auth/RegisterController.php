<?php

namespace Mitra\Http\Controllers\Auth;
use Socialite;
use Mitra\User;
use Mitra\SocialProvider;
use Mitra\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'profile_image' => 'default.png',
            'organization' => 'Amrita',
            'designation' => 'Student',
            'city' => 'Unknown'
        ]);
    }
    /**
     * Redirect the user to the socialsite's authentication page.
     *
     * @return Response
     */

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from .
     *
     * @return Response
     */

    public function handleProviderCallback($provider)
    {
        try
        {
           $socialUser = Socialite::driver($provider)->user();

        }
        catch (Exception $e)
        {
          return redirect('/#error');
        }

        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();

        if (!$socialProvider)
        {
          $user = User::firstOrCreate([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'profile_image' => 'default.png'
                  ]);

          $user->socialProviders()->create([
            'provider_id' => $socialUser->getId(),
            'provider' => $provider
          ]);
        }
        else
          $user = $socialProvider->user;

        auth()->login($user);
        auth()->user();

        return redirect()->to('/home');
    }
}
