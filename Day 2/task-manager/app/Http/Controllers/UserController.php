<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){

        $user = User::find(1);
        return view('user.login',['user'=>$user]);
    }

    public function register(){
        return view('user.register');
    }

    public function postRegister(Request $request){

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user = User::create(['name' => $name, 'email'=> $email, 'password'=> md5($request->password)]);

//        $user = new User;
//        $user->name = $name;
//        $user->email = $email;
//        $user->password = md5($password);
//        $user->save();

        return redirect('/tasks');
    }
}
