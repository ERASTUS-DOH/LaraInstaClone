<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    ////
    public function index(\App\User $user)
    {

      $data = ['User'=> Auth::user(),];
//        $data =


        return view('profiles.index',$data);
    }

    public function edit(User $user){
       $this->authorize('update',auth::user()->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user){

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' =>'',
            'image' => '',
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profiles','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }
        auth::user()->profile()->update(array_merge(
            $data,
            $imageArray ?? []

        ));
        return redirect("/profile1/{$user->id}");
    }
}
