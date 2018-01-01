<?php

namespace App\Http\Controllers\FrontEnd;

use App\Ads;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

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

        $pageTitle = 'TAT | Index';

    	return view('index',compact('newAds','commonAds','featuredAds','categories','pageTitle'));
    }

    public function showContactForm(){
        $pageTitle = "TAT | Contact Us";
        return view('frontend.contact.index',compact('pageTitle'));
    }

    public function sendContactForm(Request $request){
        $this->validate($request,[
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'msg' => 'required|string',
               
            ]);

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $msg = $request->msg;
       
       Mail::send('emailContactUs', ['name' => $name, 'email' => $email , 'subject' => $subject , 'msg' => $msg], function ($message) use ($email)
        {

            $message->from($email, $name= null);

            $message->to('eng.nour.ziadaa@gmail.com' ,'Admin');

            $message->subject("Contact Us Message From TAT WebSite");

        });

        Session::flash('success', 'Your Message Send Successfuly');
        return redirect()->back();
    }
}
