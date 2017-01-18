<?php
/**
 * Created by PhpStorm.
 * User: erman-pc
 * Date: 18.Oca.2017
 * Time: 16:14
 */

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;

class datatoPDF extends Model
{
    //
    protected $table = 'articles';

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }

}