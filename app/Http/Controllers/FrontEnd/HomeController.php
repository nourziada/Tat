<?php

namespace App\Http\Controllers\FrontEnd;

use App\Ads;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('isUser');
    }*/

    public function showIndex(){
    	// New Adses
    	$newAds = Ads::orderBy('created_at','desc')->take(4)->get();

        //Common Adses
        $commonAds = Ads::orderBy('views','desc')->take(4)->get();

        //Featured Adses 
        $featuredAds = Ads::orderBy('price','desc')->take(3)->get();
    	// 7 Categories
    	$categories = Category::orderBy('created_at','desc')->take(7)->get();

    	return view('index',compact('newAds','commonAds','featuredAds','categories'));
    }
}
