@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <b><h4 class="card-header">{{ $user->name }}</b>'s Profile</h4>

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
                    <b><h5 class="card-header">{{ $user->name }}</b>'s Posts:</h5>
                <ul class="card-body">
                    @if(!(($posts->first()) == null))
                    <div>
                        @foreach($posts as $post)
                        <div class="card" style="margin-block-end: 20px">
                            <h6 class="card-header"><a href="{{ route('posts.show', ['post_id' => $post->id]) }}">{{ $post->title }}</a></h6>
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
                        </div>
                        @endforeach
                    </div>
                    @else
                    <h5 class="row justify-content-center">No posts!</h5>
                    @endif
                </ul>

                @if(!($user->phone == null))
                <h5 class="card-header" style="margin-bottom:20px">Information</h5>
                <div class="row justify-content-center">
                    <div class="card-body" style="margin-left:20px">
                        <b>Phone: </b>
                        {{ $user->phone->phone}}
                    </div>
                </div>
                @endif

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
                <h5 class="row justify-content-center">User is not in any group.</h5>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection