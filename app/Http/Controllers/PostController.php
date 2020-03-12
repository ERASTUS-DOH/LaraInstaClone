<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    //creating the posts creation funtion.
    public function create(){
        return view('posts/create');
    }

    //creating the store function.
    public function store(){
        $data = request()->validate([
            'caption'=>'required',
            'image'=>['required','image']
        ]);

        $imagePath = request('image')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();

        Auth()->user()->posts()->create([
            'caption'=> $data['caption'],
            'image' => $imagePath,
        ]);
//        dd("weldone");
        return redirect('/profile1/'.\auth()->user()->id);
        //dd(request()->all());
    }

    public function show(\App\Post $post){
        return view('posts.show',compact('post'));
    }
}
