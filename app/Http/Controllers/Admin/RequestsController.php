<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Requestt;
use Illuminate\Http\Request;
use Session;

class RequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showAdminRequests(){
    	$requests = Requestt::orderBy('created_at','desc')->paginate(20);
    	return view('admin.request.index',compact('requests'));
    }

    public function deleteAdminRequests($id){
    	$request = Requestt::find($id);
    	$request->delete();

    	Session::flash('success', 'Advertising Deleted Successfuly');
        return redirect()->back();
    }

    public function showAdminRequestsSearch(Request $request){
        $search = $request->search;
        $requests = Requestt::where('title' , 'like' , '%' .  $search . '%')->orderBy('created_at','desc')->paginate(20);

        return view('admin.request.index',compact('requests'));

    }
}
