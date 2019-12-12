@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">{{ $user->name }} 's Posts:</div>
                <ul class="card-body">
                    @if(!empty($posts))
                        @foreach($posts as $post)
                            <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></li>
                        @endforeach
                    @else
                        <a>No posts!</a>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection