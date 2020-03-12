<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
 protected $guarded = [];

 //setting up a default image for the profile.
    public function profileImage(){
        $imagePath = ($this->image)? $this->image:'profiles/NsBZ7UbeaMYcTbSVi2pVJAKqPNu3DAhbBuJBdsRi.jpeg';

        return '/storage/'.$imagePath;
    }
    //defining the relationship between the Profile and the user.
    public function user(){
        return $this->belongsTo(User::class);
    }
}
