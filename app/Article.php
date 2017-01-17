<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;
    //

    protected $fillable = ["title","slug","content","user_id","category_id","status"];

    protected $appends = ["thumb_image"];



    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
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
