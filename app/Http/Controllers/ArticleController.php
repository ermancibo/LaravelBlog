<?php

namespace App\Http\Controllers;

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

    public function index($slug)
    {
        //
        $article = Article::where('slug',$slug)->first();
        return view('article',compact('article'));

    }


}
