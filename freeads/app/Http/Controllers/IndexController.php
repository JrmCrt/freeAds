<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class IndexController extends Controller
{
    public function home()
    {
    	if(is_null(Session::get('id')))
    		return view('home');	
    	else
    		return view('welcome' ,['username' => Session::get('username') ]);
    }
}
