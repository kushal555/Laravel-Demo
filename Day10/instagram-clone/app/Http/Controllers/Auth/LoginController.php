<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
        }
        catch(\Exception $exception){
            return  redirect(route('login'));
        }

        // check the user with provider id is exist in your db or not
        // either check with email or you check with provider id
        $existingUser = User::where(['provider_type'=>'google','provider_id'=>$user->id])->first();
        if($existingUser){
            // login with existing
            auth()->login($existingUser,true);
        }else{
            // create a user
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->username = '-';
            $newUser->password = Hash::make($user->getEmail());
            $newUser->provider_type = 'google';
            $newUser->provider_id = $user->getId();
            $newUser->save();

            // set the profile of user
            $newUser->profile()->create([
                'about_me'=>'Login from Google',
                'website'=>'https://google.com',
                'profile_pic_url'=>$user->getAvatar()]);

            // login with created user
            auth()->login($user,true);
        }
        return redirect(route('home'));

    }
}
