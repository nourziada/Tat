<?php

namespace App\Http\Controllers\Admin;

use App\Ads;
use App\Http\Controllers\Controller;
use App\Requestt;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(){
        $ads = Ads::all();

        $users = User::all();

        $requests = Requestt::all();

    	return view('admin.index',compact('ads','users','requests'));
    }

    // Methods for Passwords 

    public function showPassword(){
        return view('admin.password.update');
    }

    
    public function changePassword(Request $request){
        $this->validate($request , [
                'old_password' => 'required',
                'password' => 'required|min:6|confirmed|different:old_password',
                'password_confirmation' => 'required',
            ]);


        $user = Auth::user();

        $u_user = User::find(Auth::id());

        if(Hash::check($request->old_password, $user->password)){
            $u_user->password =  Hash::make($request->password);
            $u_user->save();

            Session::flash('success' , 'Done ! Password Updated Successfuly');
            return redirect()->back();
        }else {
            Session::flash('error' , 'the Old Password does not Match with Our Recourdes');
            return redirect()->back();
        }
    }
}
