<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Session;

class SettingsController extends Controller
{
     public function __construct()
    {
        $this->middleware('admin');
    }

    public function showAdminSettings(){
    	$settings = Setting::first();
    	return view('admin.setting.update',compact('settings'));

    }

    public function updateAdminSettings(Request $request){
    	$this->validate($request , [
                'desc' => 'required|max:200',
                'email' => 'required|email',
                'facebook' => 'required',
                'twitter' => 'required',
                'google' => 'required',
                'website' => 'required|url',
            ]);

    	$setting = Setting::first();

    	$setting->desc = $request->desc;
    	$setting->email = $request->email;
    	$setting->facebook = $request->facebook;
    	$setting->twitter = $request->twitter;
    	$setting->google = $request->google;
    	$setting->website = $request->website;

    	$setting->save();

    	Session::flash('success', 'Data Updated Successfuly');
        return redirect()->back();
    }
}
