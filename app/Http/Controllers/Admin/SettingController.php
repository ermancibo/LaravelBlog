<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    //
    public function index(){
        $settings = Setting::all();
        return view("admin.site_settings",compact('settings'));
    }


    public function update(Request $request){
        $this->validate($request,[
           'title'=>'required',
           'author'=>'required',
           'description'=>'required',
           'keywords'=>'required',
           'facebook'=>'required',
           'twitter'=>'required',
           'github'=>'required'
        ]);

        Setting::find(1)->update(["value" => $request->title]);
        Setting::find(2)->update(["value" => $request->author]);
        Setting::find(3)->update(["value" => $request->description]);
        Setting::find(4)->update(["value" => $request->keywords]);
        Setting::find(5)->update(["value" => $request->facebook]);
        Setting::find(6)->update(["value" => $request->twitter]);
        Setting::find(7)->update(["value" => $request->github]);

        Session::flash('durum',1);

        return redirect('site-settings');
    }
}
