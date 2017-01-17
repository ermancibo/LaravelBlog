<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    //
    protected $fillable = ['name','imageable_id','imageable_type'];
}
