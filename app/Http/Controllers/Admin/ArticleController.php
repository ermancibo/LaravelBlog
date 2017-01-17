<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy("created_at","desc")->paginate(10);
        return view("admin.article_index",compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck("title","id")->all();

        return view("admin.article_create",compact('categories'));
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
            "title" => "required|max:255",
            "content" => "required",
            "category_id" => "required",
            "image" => "required"
        ]);

        $input = $request->all();
        $input["user_id"] = Auth::user()->id;
        $input["status"] = 0;

        $article = Article::create($input);

        if($image = $request->file("image"))
        {
            $time = time();
            $image_name = $time.".".$image->getClientOriginalExtension();
            $thumb = "thumb_".$time.".".$image->getClientOriginalExtension();

            Image::make($image->getRealPath())->fit(1900,872)->fill(array(0,0,0,0.65))->save(public_path("uploads/".$image_name));
            Image::make($image->getRealPath())->fit(600,400)->save(public_path("uploads/".$thumb));

            $input = [];
            $input["name"] = $image_name;
            $input["imageable_id"] = $article->id;
            $input["imageable_type"] = "App\Article";

            Img::create($input);

        }

        Session::flash("durum",1);
        return redirect("/article");
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
        $article = Article::find($id);
        $categories = Category::pluck("title","id")->all();

        return view("admin.article_edit",compact('article','categories'));
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
            "title" => "required|max:255",
            "content" => "required",
            "category_id" => "required"
        ]);

        $input = $request->all();
        $article = Article::find($id);
        $article->update($input);

        if($image = $request->file("image"))
        {
            $image_name = $article->image->name;
            $thumb = "thumb_".$article->image->name;

            Image::make($image->getRealPath())->fit(1900,872)->fill(array(0,0,0,0.65))->save(public_path("uploads/".$image_name));
            Image::make($image->getRealPath())->fit(600,400)->save(public_path("uploads/".$thumb));


        }

        Session::flash("durum",1);
        return redirect("/article");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article_image = Article::find($id)->image->name;

        @unlink(public_path("uploads/".$article_image));
        @unlink(public_path("uploads/thumb_".$article_image));

        Img::where("imageable_id",$id)->where("imageable_type","App\Article")->delete();

        Article::destroy($id);

        Session::flash("durum",1);

        return redirect("/article");
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = ($request->status == "true") ? 1 : 0;

        Article::find($id)->update(["status" => $status]);

    }
}
