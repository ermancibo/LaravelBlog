<?php

namespace App\Http\Controllers\Admin;

use App\AuthorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $requests =AuthorRequest::orderBy("created_at","desc")->paginate(10);
        return view("admin.request_index",compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        AuthorRequest::destroy($id);

        Session::flash("durum",1);

        return redirect("/requests");
    }
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = ($request->status == "true") ? 1 : 0;

        if($status)
        {

            DB::table("role_user")->insert(["user_id" => $id, "role_id" => 2]);
        }
        else
        {
            DB::table("role_user")->where("user_id",$id)->where("role_id",2)->delete();
        }

    }
}
