<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
use App\User;
use Request;
use Session;
use Html;
use Mail;
use App\Ad;

class AdController extends Controller
{
    public function newAds()
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');
    	return view('newads');
    }

    public function add()
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');

    	$ad = New Ad;

		if( !empty(Request::file('picture')) )
    	{
    		$file = Request::file('picture'); 
    		$fName = Request::file('picture')->getClientOriginalName();
    		$destinationPath = "/var/www/html/test/Projets_MVC_Free_Ads/freeads/files";
			$file->move($destinationPath, $fName); 
			$ad->picture = $fName;
    	} 

		$ad->title = Request::input('title');
		$ad->description = Request::input('description');
		$ad->price = Request::input('price');
		$ad->id_user = Session::get('id');
		$ad->save();
		echo "Ad successfully added !";
		return view('newads');
    }

    public function adList($sort=null)
    {
    	if($sort) $ads = DB::table('ads')
    		->select('ads.*', 'users.username')
    		->join('users', 'users.id', '=', 'ads.id_user')
    		->orderBy("ads." . $sort, 'desc')
    		->get();
    	else $ads = DB::table('ads')->select('ads.*', 'users.username')->join('users', 'users.id', '=', 'ads.id_user')->get();

    	$matching = DB::table('ads')->select('ads.*', 'users.username')->join('users', 'users.id', '=', 'ads.id_user')
    	->where('id_user', '!=', Session::get('id'))
    	->orderBy(DB::raw('RAND()'))->take(3)->get();

    	return view('listads', ['ads' => $ads, 'matching' => $matching]);
    }

    public function edit($id=null)
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');

    	$myads = DB::table('ads')->where('id_user', '=', Session::get('id'))->get();
    	$ad = DB::table('ads')->where('id', '=', $id)->get();

    	if($ad[0]->id_user != Session::get('id')) return redirect()->action('IndexController@home');
    	return view('editads', ['myads' => $myads, 'ad' => $ad[0]]);
    }

    public function modify($id)
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');
    		$ad = Ad::find($id);
    		$ad->title = Request::input('title');
    		$ad->description = Request::input('description');
    		$ad->price = Request::input('price');

    		if(!empty(Request::file('picture')))
    		{
		    	$file = Request::file('picture');
		    	$fName = Request::file('picture')->getClientOriginalName();
		    	$destinationPath = "/var/www/html/test/Projets_MVC_Free_Ads/freeads/files";
				$file->move($destinationPath, $fName);
				$ad->picture = $fName;
    		}

    		for($i=1; $i < 5; $i++)
    		{
    			$f = Request::file("picture$i");
    			if(!empty($f))
    			{
    				$fName = $f->getClientOriginalName();
		    		$destinationPath = "/var/www/html/test/Projets_MVC_Free_Ads/freeads/files/$id";
					$f->move($destinationPath, $fName);
    			}
    		}

    		$ad->save();
    		return redirect()->action('AdController@myads');
    }
    public function myads()
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');
    	$myads = DB::table('ads')->where('id_user', '=', Session::get('id'))->get();
    	return view('editads', ['myads' => $myads]);
    }

    public function delete($id)
    {
    	if(is_null(Session::get('id'))) return redirect()->action('IndexController@home');
    	
    	$ad = DB::table('ads')->where('id', '=', $id)->get();
		if($ad[0]->id_user != Session::get('id')) return redirect()->action('IndexController@home');

    	Ad::where('id', $id)->delete();
    	return redirect()->action('AdController@myads');
    }

    public function show($id)
    {
    	$ad = DB::table('ads')->where('id', '=', $id)->get()[0];
    	$pictures = $this->getPictures($id);

    	$matching = DB::table('ads')->select('ads.*', 'users.username')->join('users', 'users.id', '=', 'ads.id_user')
    	->where('id_user', $ad->id_user)
    	->where('ads.id', '!=', $ad->id)
    	->orderBy(DB::raw('RAND()'))->take(3)->get();

    	return view('show', ['ad' => $ad, 'pictures' => $pictures, 'matching' => $matching]);
    }

    public function getPictures($id)
    {
    	$images = [];
		foreach(glob("/var/www/html/test/Projets_MVC_Free_Ads/freeads/files/$id/*") as $f)
		{
			$a = explode("/", $f);
			$images[] = end($a);
		}
		return $images;
    }

    public function search()
    {
    	return view('search');
    }

    public function doSearch()
    {
    	extract(Request::all());
    	$ads = DB::table('ads')
    	->select('ads.*', 'users.username')
    	->join('users', 'users.id', '=', 'ads.id_user')
    	->where('title', 'like', "%$title%" )
    	->where('description', 'like', "%$description%" )
    	->whereBetween('price', [$price1, $price2])
    	->get();

    	$matching = DB::table('ads')->select('ads.*', 'users.username')->join('users', 'users.id', '=', 'ads.id_user')
    	->where('id_user', '!=', Session::get('id'))
    	->orderBy(DB::raw('RAND()'))->take(3)->get();

    	return view('listads', ['ads' => $ads, 'matching' => $matching]);
    }
}
