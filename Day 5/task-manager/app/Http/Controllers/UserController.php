<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
       $this->middleware('custom.redirect')->except('logout');
       $this->middleware('custom.auth')->only('logout');
    }

    public function login(){

        $user = User::find(1);
        return view('user.login',['user'=>$user]);
    }

    public  function checkLogin(Request $request){
        request()->validate([
            'username'=> 'required',
            'password' =>'required'
        ]);
        $user = User::where(['username'=>$request->username,'password'=>md5($request->password)])->first();
        if($user){
            flash('alert-success','Hello '.$user->name.' ! We are welcoming you');
            $request->session()->put('user',$user);

            return redirect('/tasks');
        }else{
            flash('alert-danger','Invalid inputs');
        }
        return redirect('login');
    }

    public function register(){
        return view('user.register');
    }

    public function postRegister(Request $request){
        // Create a custom authentication
        // validation
        // Put the error message in blade template
        // check the fillable array in model
        // save the user
        // put the user to session

        $user = request()->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'username' => ['required','unique:users'],
            'password' => ['required','min:5'],
            'confirmPassword' => ['required','same:password']
        ]);
        $user['password'] = md5($user['password']);
        User::create($user);
        $request->session()->put('user',$user);
        return redirect('/tasks');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/tasks');
    }
}
