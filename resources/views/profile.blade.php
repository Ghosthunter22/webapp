@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
                <div class="row justify-content-center">

                        <div class="profile-header-container">
                            <div class="profile-header-img">
                                <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="150" height="150"/>
                                <!-- badge -->
                                <div class="rank-label-container">
                                    <span class="label label-default rank-label">{{$user->name}}</span>
                                </div>
                            </div>
                        </div>
            
                    </div>
                    
                <div class="card-header">My Posts:</div>
                <ul class="card-body">
                    @if(!empty($posts))
                        @foreach($posts as $post)
                        <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></li>
                        @endforeach
                    @else
                    <a>No posts!</a>
                    @endif
                </ul>
                <div class="row justify-content-center">
                        <a href="{{ route('posts.create') }}"><button type="submit" class="btn btn-primary">Create Post</button></a>
                </div>
                <div class="card-header">Change avatar:</div>
                <div class="row justify-content-center">
                        <form action="/profile" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection