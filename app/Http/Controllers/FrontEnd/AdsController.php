<?php

namespace App\Http\Controllers\FrontEnd;

use App\Ads;
use App\Category;
use App\Favorite;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isUser');
    }
    

    public function index()
    {
        $pageTitle = "TAT | My Ads";

        $allMyAds = Ads::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(15);
        return view('frontend.ads.myads',compact('pageTitle','allMyAds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pageTitle = "TAT | Create Ads";
        $user = Auth::user();
        // check if the User Type is TAGER
        if($user->type == 1) {

            // get All Categiores
            $categories = Category::all();


            return view('frontend.ads.create',compact('categories','pageTitle'));

        }else{
            Session::flash('infoData','Your Account Type is Regular User not Dealer ! You can change User Type from Settings to post Ads');
            return redirect()->back();
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'image_1' => 'required|image',
            'image_2' => 'image',
            'image_3' => 'image',
            'image_4' => 'image',
            'item_type' => 'required',
            'price' => 'required|integer|min:1',
            'category_id' => 'required',
            'city' => 'required|string',
            'desc' => 'required|max:5000'

        ]);

        $ads = new Ads;
        
        if($request->hasFile('image_1')){
            $featured = $request->image_1;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $ads->image_1 = '/uploads/' . $featured_new_name;
        }

        if($request->hasFile('image_2')){
            $featured = $request->image_2;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $ads->image_2 = '/uploads/' . $featured_new_name;
        }

        if($request->hasFile('image_3')){
            $featured = $request->image_3;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $ads->image_3 = '/uploads/' . $featured_new_name;
        }

        if($request->hasFile('image_4')){
            $featured = $request->image_4;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $ads->image_4 = '/uploads/' . $featured_new_name;
        }

        $ads->title = $request->title;
        $ads->type = $request->item_type;
        $ads->price = $request->price;
        $ads->desc = $request->desc;
        $ads->category_id = $request->category_id;
        $ads->city = $request->city;
        $ads->user_id = Auth::user()->id;
        
        $ads->save();


        Session::flash('success','Ads Added Successfuly');
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
        $ads = Ads::findOrFail($id);

        $ads->views++;
        $ads->save();
        
        $fav = Favorite::where('ads_id',$id)->where('user_id',Auth::user()->id)->get();

        $pageTitle = 'TAT | ' . $ads->title;
        return view('frontend.ads.show',compact('ads','pageTitle','fav'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = "TAT | Edit Ads";
        $user = Auth::user();

        $ads = Ads::findOrFail($id);
        // check if the User Type is TAGER
        if($user->type == 1) {

            // get All Categiores
            $categories = Category::all();


            return view('frontend.ads.edit',compact('categories','pageTitle','ads'));

        }else{
            Session::flash('infoData','Your Account Type is Regular User not Dealer ! You can change User Type from Settings to post Ads');
            return redirect()->back();
        }
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
        $this->validate($request,[
            'title' => 'required|max:255',
            'image_1' => 'image',
            'image_2' => 'image',
            'image_3' => 'image',
            'image_4' => 'image',
            'item_type' => 'required',
            'price' => 'required|integer|min:1',
            'category_id' => 'required',
            'city' => 'required|string',
            'desc' => 'required|max:5000'

        ]);

        $ads = Ads::find($id);
        
        if($request->hasFile('image_1')){
            $featured = $request->image_1;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $ads->image_1 = '/uploads/' . $featured_new_name;
        }

        if($request->hasFile('image_2')){
            $featured = $request->image_2;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $ads->image_2 = '/uploads/' . $featured_new_name;
        }

        if($request->hasFile('image_3')){
            $featured = $request->image_3;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $ads->image_3 = '/uploads/' . $featured_new_name;
        }

        if($request->hasFile('image_4')){
            $featured = $request->image_4;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $ads->image_4 = '/uploads/' . $featured_new_name;
        }

        $ads->title = $request->title;
        $ads->type = $request->item_type;
        $ads->price = $request->price;
        $ads->desc = $request->desc;
        $ads->category_id = $request->category_id;
        $ads->city = $request->city;
        $ads->save();


        Session::flash('success','Ads Updated Successfuly');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ads::find($id);
        $ads->delete();

        Session::flash('success','Ads Deleted Successfuly');
        return redirect()->back();
    }
}
