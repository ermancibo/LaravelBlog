<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use Sluggable;
    protected $fillable = ['title','slug'];
    protected $appends = ["thumb_image"];

    public function sluggable(){
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }
    public function image()
    {
        return $this->morphOne("App\Img","imageable");
    }

    public function getThumbImageAttribute()
    {
        $image = asset("uploads/thumb_".$this->image()->first()->name);
        return '<img src="'.$image.'" class="img-thumbnail" width="150" />';
    }
}
