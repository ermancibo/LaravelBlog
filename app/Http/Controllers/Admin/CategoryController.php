<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

use App\Http\Requests;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(10);
        return view('admin.category_index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category_create');
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
        $this->validate($request,[
           'title'=>'required|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $category = Category::create($request->all());

        if($image = $request->file("image"))
        {
            $time = time();
            $image_name = $time.".".$image->getClientOriginalExtension();
            $thumb = "thumb_".$time.".".$image->getClientOriginalExtension();
            Image::make($image->getRealPath())->fit(1900,872)->fill(array(0,0,0,0.5))->save(public_path("uploads/".$image_name));
            Image::make($image->getRealPath())->fit(600,400)->save(public_path("uploads/".$thumb));


            $input = [];
            $input["name"] = $image_name;
            $input["imageable_id"] = $category->id;
            $input["imageable_type"] = "App\Category";

            Img::create($input);

        }

        Session::flash("durum",1);
        return redirect("/categories");
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
        $category = Category::find($id);

        return view("admin.category_edit",compact('category'));
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
        $this->validate($request,[
            "title" => "required|max:255"
        ]);

        $category = Category::find($id);
        $category->update($request->all());

        if($image = $request->file("image"))
        {
            $image_name = $category->image->name;
            $thumb = "thumb_".$category->image->name;

            Image::make($image->getRealPath())->fit(1900,872)->fill(array(0,0,0,0.5))->save(public_path("uploads/".$image_name));
            Image::make($image->getRealPath())->fit(600,400)->save(public_path("uploads/".$thumb));


        }

        Session::flash("durum",1);
        return redirect("/categories");
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
        $category_image = Category::find($id)->image->name;

        @unlink(public_path("uploads/".$category_image));
        @unlink(public_path("uploads/thumb_".$category_image));

        Img::where("imageable_id",$id)->where("imageable_type","App\Category")->delete();

        Category::destroy($id);

        Session::flash("durum",1);

        return redirect("/categories");

    }
}
