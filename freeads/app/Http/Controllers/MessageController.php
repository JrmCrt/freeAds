<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
use App\User;
use Request;
use Session;
use Html;
use Mail;
use App\Message;

class MessageController extends Controller
{
    public function inbox()
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');

    	$mails = DB::table('messages')->select("messages.*", "users.username")->join('users', 'users.id', '=', 'messages.id_sender')
    	->where('id_recipient', '=', Session::get('id'))
    	->orderBy("messages.created_at", 'desc')
    	->get();
    	return view('mail', ["mails" => $mails]);
    }

    public function send($id=null)
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');

    	$user = User::find($id);
    	return view('sendmail', ['user' => $user]);
    }

    public function doSend($id)
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');

    	$message = new Message;
    	$message->text = Request::input('text');
    	$message->id_sender = Session::get('id');
    	$message->id_recipient = $id;

    	$message->save();
    	return redirect()->action('MessageController@inbox');
    }

    public function read($id=null)
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');

    	$mail = DB::table('messages')->select("messages.*", "users.username")->join('users', 'users.id', '=', 'messages.id_sender')
    	->where('messages.id', '=', $id)
    	->get()[0];
    	if($mail->id_recipient != Session::get('id')) return redirect()->action('IndexController@home');

    	if($mail->seen == "0")
    	{
    		$m = Message::find($id);
    		$m->seen = 1;
    		$m->save();
    	}

    	return view('read', ['mail' => $mail]);
    }

}
