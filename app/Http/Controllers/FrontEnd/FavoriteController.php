<?php

namespace App\Http\Controllers\FrontEnd;

use App\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class FavoriteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('isUser');
    }
    
    public function index()
    {
        $pageTitle = "TAT | Favorite Ads";

        $allAds = Favorite::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(15);


        return view('frontend.favorite.index',compact('pageTitle','allAds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fav = new Favorite;
        $fav->user_id = Auth::user()->id;
        $fav->ads_id = $request->ads_id;
        $fav->save();

        Session::flash('success','You saved this Ads in your Favorite');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $fav = Favorite::where('ads_id',$id)->where('user_id',Auth::user()->id)->first();


        $fav->delete();

        Session::flash('success','You Remove this Ads from your Favorite');
        return redirect()->back();
    }
}
