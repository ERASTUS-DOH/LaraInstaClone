<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    //defining the relationship between a user and a posts.
    public function user(){
        return $this->belongsTo(User::class);
    }
}
