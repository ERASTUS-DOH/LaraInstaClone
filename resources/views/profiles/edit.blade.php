@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')

            <h1>Edit Profile</h1>
            <div class="form-group row">

                <label for="title" class="col-md-4 col-form-label ">Title</label>
                <input id="title"
                       type="text"
                       required
                       class="form-control @error('title')is-invalid @enderror" name="title"
                       value="{{ old('')??$user->profile->title }}" required autocomplete="title" autofocus>

                @error('title')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <div class="form-group row">

                <label for="description" class="col-md-4 col-form-label ">Description</label>
                <input id="description"
                       type="text"
                       required
                       class="form-control @error('description')is-invalid @enderror" name="description"
                       value="{{ old('') ?? $user->profile->description }}" required autocomplete="description" autofocus>

                @error('description')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <div class="form-group row">

                <label for="url" class="col-md-4 col-form-label ">Url</label>
                <input id="url"
                       type="text"
                       required
                       class="form-control @error('url')is-invalid @enderror" name="url"
                       value="{{ old('') ?? $user->profile->url }}" required autocomplete="Url" autofocus>

                @error('Url')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <div class="row">
                <label for="image" class="col-md-4 col-form-label ">Profile-Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="row pt-5">
                <button class="btn btn-primary"> Save Profile</button>
            </div>
        </form>
    </div>
@endsection

