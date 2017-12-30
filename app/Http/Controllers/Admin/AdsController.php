<?php

namespace App\Http\Controllers\Admin;

use App\Ads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class AdsController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }

    public function showAdminAds(){
    	$ads = Ads::orderBy('created_at','desc')->paginate(20);
    	return view('admin.ads.index',compact('ads'));
    }

    public function deleteAdminAds($id){
    	$ads = Ads::find($id);
    	$ads->delete();

    	Session::flash('success', 'Advertising Deleted Successfuly');
        return redirect()->back();
    }

    public function showAdminAdsSearch(Request $request){
        $search = $request->search;
        $ads = Ads::where('title' , 'like' , '%' .  $search . '%')->orderBy('created_at','desc')->paginate(20);

        return view('admin.ads.index',compact('ads'));

    }
}
