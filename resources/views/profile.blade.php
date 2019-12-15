@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">Profile</h4>

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
                                <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="100" height="100"/>
                                <h5 class="row justify-content-center" style="margin-top:10px">{{$user->name}}</h5>
                            </div>
                        </div>
            
                    </div>
                    
                <h5 class="card-header">My Posts:</h5>
                <ul class="card-body">
                    @if(!(($posts->first()) == null))
                    <div>
                        @foreach($posts as $post)
                        <div class="card" style="margin-block-end: 20px">
                            <h5 class="card-header"><a href="{{ route('posts.show', ['post_id' => $post->id]) }}">{{ $post->title }}</a></h5>
                            @if(!(($post->image) == null))
                            <div class="modal-header">
                                @if(strpos(($post->image), 'image')!==false)
                                <img src="/storage/images/{{ $post->image }}"/>
                                @else
                                <img src="{{$post->image}}" />
                                @endif
                            </div>
                            @endif
                            <div class="card-body">{{ $post->post }}</div>    
                            @if($post->user_id == auth()->id())
                            <div class="card-footer">
                                <div style="width:400px">  
                                    <div style="float: left; width: 0px">
                                        <a href="{{ route('posts.edit', ['post_id' => $post->id]) }}"><button class="btn btn-secondary">Edit</button>
                                    </div>
                                    <div style="float: right; width: 340px">
                                        <form method="POST"
                                        action="{{ route('posts.destroy', ['post_id' => $post->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <h5 class="row justify-content-center">No posts!</h5>
                    @endif
                </ul>
                <div class="row justify-content-center">
                    <a href="{{ route('posts.create') }}"><button type="submit" class="btn btn-primary" style="margin-bottom:20px">Create Post</button></a>
                </div>

                <h5 class="card-header" style="margin-bottom:20px">Groups:</h5>
                @if(!($groups->first() == null))
                <div class="row justify-content-center">
                    <div class="card-body" style="margin-left:20px">
                        @foreach ($groups as $group)
                        <div class="card" style="margin-top: 10px; width:250px">
                            <a href="{{ route('groups.show', ['group_id' => $group->id]) }}" class="card-header">{{ $group->title }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                
                <h5 class="row justify-content-center">Not a member of a group.</h5>
                <div class="row justify-content-center">
                <a href="{{ route('groups.index') }}"><button type="submit" class="btn btn-primary" style="margin-bottom:20px">Browse Groups</button></a>
                </div>
                @endif

                <h5 class="card-header" style="margin-bottom:20px">Information</h5>
                <div class="row justify-content-center">
                    <div class="card-body" style="margin-left:20px">
                        @if(!($user->phone == null))
                        <b>Phone: </b>
                        {{ $user->phone->phone}}
                        <div class="card-footer">
                            <div style="width:400px">  
                                <div style="float: left; width: 0px">
                                    <button class="btn btn-secondary">Edit</button>
                                </div>
                                <div style="float: right; width: 340px">
                                    <form method="POST"
                                    action="{{ route('phones.destroy', ['phone_id' => $user->phone->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row justify-content-center">
                        <a href="{{ route('phones.create') }}"><button type="submit" class="btn btn-primary" style="margin-bottom:20px">Add Phone Number</button></a>
                        </div>
                        @endif
                    </div>
                </div>

                <h5 class="card-header" style="margin-bottom:20px">Change avatar:</h5>
                <div class="row justify-content-center">
                        <form action="/profile" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-bottom:20px">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection