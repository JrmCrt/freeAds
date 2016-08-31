<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use DB;
use Session;
class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function auth()
    {
        $email = Request::input('email');
        $password = sha1(Request::input('password'));
        $user = DB::table('users')->where('email', '=', $email)->where('password', '=', $password)->get();
        
        if(count($user) == 1)
        {
            if($user[0]->activated != "1") return view('home', ['message' => 'Please activate your account.']);
            Session::put('id', $user[0]->id);
            Session::put('username', $user[0]->username);
            return redirect()->action('IndexController@home');
        }
        elseif(!is_null(Request::input('email'))) {
            return view('home', ['message' => 'Unknown user or invalid password.']);
        }
        else{
            return view('home');   
        }    
     

    }
}