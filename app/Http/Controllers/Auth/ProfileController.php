<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('isUser');
    }

    public function showProfile(){
    	$pageTitle = "TAT | Profile";

    	$user = Auth::user();
    	return view('frontend.profile.index',compact('pageTitle','user'));
    }

    public function updateProfile(Request $request){
    	$this->validate($request,[
    			'name' => 'required|string|max:100',
    			'phone' => 'required|numeric',
                'password' => 'nullable| min:6|confirmed|different:old_password',
    		]);

    	$user = User::find(Auth::user()->id);
    	$user->name = $request->name;
    	$user->phone = $request->phone;
    	$user->type = $request->type;
    	

    	if($request->old_password != null && $request->password !== null && $request->password_confirmation != null) {

    		if(Hash::check($request->old_password, $user->password)){
	            $user->password =  Hash::make($request->password);
	            $user->save();

	            Session::flash('success' , 'Done ! Password Updated Successfuly');
	            return redirect()->back();
	        }else {
	            Session::flash('error' , 'the Old Password does not Match with Our Recourdes');
	            return redirect()->back();
	        }
    	}

    	$user->save();
    	Session::flash('success' , 'Done ! Your Profile Updated Successfuly');
	    return redirect()->back();
    }
}
