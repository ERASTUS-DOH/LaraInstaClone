@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 ">
                <img src="/storage/{{$post->image}}" class="w-100">
            </div>
            <div class="col-4">
                <div class="">
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" alt="" style="max-width: 40px;">
                        </div>
                        <div class="p-3">
                            <div class="font-weight-bold text-dark">
                                <a href="/profile1/{{$post->user->id}}">
                                    <span class="text-dark" style="text-decoration: none;"> {{$post->user->username}}</span>
                                </a>   |
                                <a href="" class="pl-3">Follow</a>
                            </div>

                        </div>
                    </div>

                    <hr>

                    <p>
                        <span class="font-weight-bold text-dark">
                            <a href="/profile1/{{$post->user->id}}">
                                <span class="text-dark" style="text-decoration: none;"> {{$post->user->username}}</span>
                            </a>
                        </span> {{ $post->caption }}
                    </p>

                </div>

                <div class="row pt-5">
                    <button class="btn btn-outline-success col-lg-3"><i class="fa fa-back"><a href="{{url("profile1/".Auth::user()->id)}}">Back</a></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection

