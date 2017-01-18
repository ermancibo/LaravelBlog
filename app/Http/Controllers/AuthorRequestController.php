<?php

namespace App\Http\Controllers;

use App\AuthorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthorRequestController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        if(AuthorRequest::where("user_id",Auth::user()->id)->count())
        {
            Session::flash("durum",3);
            return redirect("/");
        }
        return view("author_request");
    }

    public function sendRequest(Request $request)
    {
        $this->validate($request,[
            "content" => "required"
        ]);

        $input = $request->all();

        $input["user_id"] = Auth::user()->id;

        AuthorRequest::create($input);

        Session::flash("durum",2);

        return redirect("/");

    }
}
