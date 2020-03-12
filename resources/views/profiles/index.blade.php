@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $User->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-baseline">
               <div class="d-flex align-items-center pb-3">
                   <div class="h4">{{ $User->username }}</div>
                   <follow-button user-id="{{ $User->id }}"></follow-button>
               </div>
                @can('update',$User->profile)
                    <a href="/p/create" >Add New Post</a>
                @endcan

            </div>
            @can('update',$User->profile)
                <a href="/profile/{{$User->id}}/edit">Edit-Profile</a>
            @endcan
               <div class="d-flex">
                <div class="pr-4"><strong>{{ $User->posts->count() }}</strong> Posts </div>
                <div class="pr-4"><strong>23K</strong> Followers</div>
                <div class="pr-4"><strong>212 K</strong> Following</div>
            </div>

            <div class="pt-2"><h6 style="font-weight: bold;">{{ $User->profile->title }}</h6></div>
            <div>{{ $User->profile->description }} <br/>students learn to code in a harmonous way.</div>
            <div><a href="www.codefreely.com">{{ $User->profile->url ?? "N/A" }}</a></div>
        </div>
    </div>
    <div class="row pt-4 ">
        @foreach($User->posts as $post)
            <div class="col-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100 pb-4">
                </a>
            </div>
        @endforeach


    </div>

</div>
@endsection

