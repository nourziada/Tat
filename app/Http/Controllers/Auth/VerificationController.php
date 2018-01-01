<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class VerificationController extends Controller
{
    public function showVerification(){
    	if(Auth::check()){
	    	$user = User::find(Auth::user()->id);
	    	// Check if the User if Verified or Not
	    	if($user->verified == 1) {
	    		return redirect()->route('index.home');
	    	}else{
	    		return view('auth.verification');
	    	}
    	}else{
    		return redirect()->route('login');
    	}
    }

    public function verification(Request $request){
    	
    	
	    	$this->validate($request,[
	    		'token' => 'required'
	    		]);

	    	$user = User::find(Auth::user()->id);
	    	if($user->verification_token == $request->token) {
	    		$user->verification_token = null;
	    		$user->verified = 1;
	    		$user->save();

	    		Session::flash('success','Your Account Has Verified Successfuly');
	    		return redirect()->route('index.home');

	    	}else{
	    		Session::flash('error','the Code you Enter is not a Valid Code');
	    		return redirect()->back();
	    	}
    }

    public function reSendVerificationToken(){
    	if(Auth::check()){
	    	$user = User::find(Auth::user()->id);
	    	$verificationToken = $user->verification_token;
	    	$email = $user->email;

	    	$sent = Mail::send('emailVerification', ['name' => $user->name, 'verificationToken' => $verificationToken , ], function ($message) use ($email)
	        {

	            $message->from('no-replay@tat.com' , 'no-replay TAT');

	            $message->to($email,$name = null);

	            $message->subject("Verification Code From TAT");

	        });

	        Session::flash('success','Verification Code re-Send Successfuly');
	        return redirect()->back();

	    }else{
	    	return redirect()->route('login');
	    }
    }
}
