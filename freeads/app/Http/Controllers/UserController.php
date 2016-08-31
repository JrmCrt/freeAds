<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\User;
use Request;
use Session;
use Html;
use Mail;

class UserController extends Controller
{


	public function h()
    {
    	return redirect()->action('UserController@home');
    }

	public function home()
    {
    	if(is_null(Session::get('id')))
    		return redirect()->action('IndexController@home');
    	else
    		return view('home', ['username' => Session::get('username')] );	
    }

    public function signin()
    {
    	return view('signin');
    }

    public function store(Request $request)
    {
       	$user = new User;
       	$user->admin = 0;

        $m = DB::table('users')->where('email', '=', Request::input('email'))->get();
        $u = DB::table('users')->where('username', '=', Request::input('username'))->get();
        if(count($m) > 0 || count($u) > 0) return view('signin', ['message' => 'Password or email already used.']);

        $token = sha1(uniqid());

       	foreach (Request::all() as $key => $value) 
       		if(!in_array($key, ['_token', 'submit']))
       			$user->$key = ($key == 'password') ? sha1($value) : $value;
        $user->token = $token;

         Mail::raw("Click on this link to activate your account : http://localhost/test/Projets_MVC_Free_Ads/freeads/public/activation?email=".Request::input('email')."&token=".$token."", function ($message) {
            $message->to(Request::input('email'));
        });   

       	$user->save();

        return view('home', ['message' => 'Registration Successful !']);
    }

    public function logout()
    {
    	Session::flush();
    	return redirect()->action('IndexController@home');
    }

    public function account()
    {
      if(is_null(Session::get('id')))
        return redirect()->action('IndexController@home');
      else{
        $info = DB::table('users')->where('id', '=', Session::get('id'))->get();

        return view('account', ['info' => $info[0]]);
      }
    }

    public function edit()
    {
      if(is_null(Session::get('id')))
        return redirect()->action('IndexController@home');
      else
      {
        $user = User::find(Session::get('id'));
        $info = DB::table('users')->where('id', '=', Session::get('id'))->get();
            foreach (Request::all() as $key => $value) 
                if(!in_array($key, ['_token', 'submit']))
                    $user->$key = ($key == 'password') ? sha1($value) : $value;
        $user->save();
        return redirect()->action('UserController@account');
      }
    }

    public function activation()
    {
        $i = DB::table('users')->where('email', '=', Request::input('email'))->where('token', '=', Request::input('token'))->get();
        if(count($i) > 0)
        {
            $user = User::where('email', Request::input('email'))->first();
            $user->activated = 1;
            $user->save();
            echo "Account successfully activated !";
        }
        else
            echo "Invalid email or token.";    
    }

    
}
