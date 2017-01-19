<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $table = 'articles';
    //
    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
