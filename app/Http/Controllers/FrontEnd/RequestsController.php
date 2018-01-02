<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Requestt;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class RequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isUser');
    }

    public function index()
    {
        $pageTitle = "TAT | Requests";

        $requests = Requestt::orderBy('created_at','desc')->paginate(15);
        return view('frontend.request.index',compact('pageTitle','requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "TAT | Create New Request";
        return view('frontend.request.create',compact('pageTitle'));
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
            'title' => 'required|string|max:1000',
            'desc' => 'required|string',
            'image' => 'image',
            'city' => 'required|string|max:200',
            ]);

        $req = new Requestt;

        if($request->hasFile('image')){
            $featured = $request->image;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $req->image = '/uploads/' . $featured_new_name;
        }

        $req->title = $request->title;
        $req->desc = $request->desc;
        $req->city = $request->city;
        $req->user_id = Auth::user()->id;
        $req->save();

        Session::flash('success','Request Addedd Successfuly');
        return redirect()->route('request.show' , $req->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $req = Requestt::findOrFail($id);
        $pageTitle = "TAT | " . $req->title;

        return view('frontend.request.show',compact('pageTitle','req'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = "TAT | Edit Request";
        $user = Auth::user();

        $req = Requestt::findOrFail($id);
       
        return view('frontend.request.edit',compact('pageTitle','req'));
        
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
            'title' => 'required|string|max:1000',
            'desc' => 'required|string',
            'image' => 'image',
            'city' => 'required|string|max:200',
            ]);

        $req = Requestt::find($id);

        if($request->hasFile('image')){
            $featured = $request->image;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);
            $req->image = '/uploads/' . $featured_new_name;
        }

        $req->title = $request->title;
        $req->desc = $request->desc;
        $req->city = $request->city;
        $req->save();

        Session::flash('success','Request Updated Successfuly');
        return redirect()->route('request.show' , $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $req = Requestt::find($id);
        $req->delete();

        Session::flash('success','Request Deleted Successfuly');
        return redirect()->back();

    }

    public function ShowMyRequests(){
        $pageTitle = "TAT | My Requests";

        $requests = Requestt::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(15);
        return view('frontend.request.myrequest',compact('pageTitle','requests'));
    }
}
