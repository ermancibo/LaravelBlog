<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function index(Request $req)
    {
        // show all data to index

        if($req->has('id')) {
            $articles = datatoPDF::where('id',$req->id)->first();
                view()->share('articles', $articles);
            if ($req->has('download')) {
                $pdf = PDF::loadView('pdf');
                $pdf->setPaper('a4', 'portrait');
                return $pdf->download($articles->title.'.pdf');
            }
            return null;
        }
        return null;
    }
}
