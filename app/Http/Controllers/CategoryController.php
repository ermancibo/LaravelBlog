<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index($slug){
        $category = Category::where('slug',$slug)->first();
        $articles = Article::where('category_id',$category->id)->where('status',1)->paginate(10);
        return view('category',compact('category','articles'));
    }
}
