<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider) {
        $user = Socialite::driver($provider)->stateless()->user();
        $AuthUser = $this->findOrCreateUser($user, $provider);
        Auth::login($AuthUser, true);
        return redirect($this->redirectTo);

//        return $user->name;
    }

    public function findorCreateUser($user, $provider) {
        $AuthUser = User::where('client_id', $user->id)->first();
        if ($AuthUser) {
            return $AuthUser;
        }
        return User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'client_id' => $user->id,
                    'provider' => strtoupper($provider)
        ]);
    }

}
