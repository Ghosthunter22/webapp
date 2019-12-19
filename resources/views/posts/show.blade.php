@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@section('content')
<div id="app">
<div class="card-body">
    <a href="{{ route('posts.index') }}"><button type="submit" class="btn btn-primary">Back to posts</button></a>
</div>
<div class="card" style="margin-left:10px; width:1000px">
<h3 class="card-header">
    @if($post->user->id == auth()->id())
    <a href="{{ route('profile') }}" {{ $post->user->name }}>
@else
    <a href="{{ route('users.show', ['id' => $post->user_id]) }}">
@endif
        <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="40" height="40"/> {{ $user->name }}
    </a>
</h3>
    <h5 class="modal-header"></a>{{ $post->title }}</h5> 
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
    @php
    use App\User;
    try{
    $userRoles = User::findOrFail(auth()->id())->roles->pluck('name');    
    }catch(Exception $e){
    }
    @endphp   
    @isset($userRoles)
    @if($post->user_id == auth()->id() || $userRoles->contains('admin'))
    <div class="card-footer">
        <div style="width:400px">  
            <div style="float: left; width: 0px">
                <a href="{{ route('posts.edit', ['post_id' => $post->id]) }}"><button class="btn btn-secondary">Edit</button></a>
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
        @endisset
    @endif
    </div>
</div>

<div style="margin-left:20px">
    <h5 style="margin-top:10px">Comments:</h5>

<div style="margin-bottom:50px">
    <form method="POST" action="{{ route('comments.store')}}">
        @csrf
        <textarea class="form-control" rows="3" style="width:800px" name="comment" type="text" placeholder="Leave a comment" value="{{ old('comment') }}" v-model="commentBox"></textarea>
        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
        <input type="submit" style="margin-top:10px" value="Save Comment" class="btn btn-success">
    </form>
</div>

<ul class="pagination"> 
        @if(!(($comments->first()) == null))
            @foreach($comments as $comment)
            <div style="margin-block-start:10px; width:800px">
                <div class="card">
                    <h6 class="card-header">
                    @if($comment->user->id == auth()->id())
                    <a href="{{ route('profile') }}">
                    @else
                    <a href="{{ route('users.show', ['id' => $comment->user_id]) }}">
                    @endif
                    <img class="rounded-circle" src="/storage/avatars/{{ $comment->user()->get()->first()->avatar }}" width="30" height="30"/>
                        {{ $comment->user()->get()->first()->name }}</a></h6>
                        
                <div class="card-body">{{ $comment->comment }}</div>
                
                @isset($userRoles)
                @if($comment->user_id == auth()->id() || $userRoles->contains('admin'))
                <div class="card-footer">
                <div style="width:400px">  
                    <div style="float: left; width: 0px">
                <a href="{{ route('comments.edit', ['post_id' => $post->id, 'comment_id' => $comment->id]) }}"><button class="btn btn-secondary">Edit</button>
                    </div>
                    <div style="float: right; width: 340px">
                <form method="POST"
                action="{{ route('comments.destroy', ['post_id' => $post->id, 'comment_id' => $comment->id]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
                </form>
                    </div>
                </div>
            </div>
            @endisset
                @endif
            </div>
            @endforeach
            </div>
        @else
            <p>No comments yet! Be the first one to comment.</p>
        @endif
    </ul>
</div>
</div>
{{-- @endsection

@section('scripts') --}}
    <script>
        console.log("IN SCRIPT");
        const app = new Vue({
            el: '#app',
            data: {
                comments: {},
                commentBox: '',
                post: {!! $post->toJson() !!},
                user: {!! Auth::check() ? auth()->user()->toJson() : 'null' !!}
            },
            mounted() {
                console.log("MOUNTED");
                this.getComments();
            },
            methods: {
                getComments() {
                    console.log("GET COMMENTS");
                    axios.get('/api/posts/'+this.post.id+'/comments')
                         .then((response) => {
                             this.comments = response.data
                         })
                         .catch(function (error) {
                             console.log(error);
                         });
                },
                postComment() {
                    console.log("POST COMMENT");
                    axios.post('/api/posts/'+this.post.id+'/comment', {
                        api_token: this.user.api_token,
                        comment: this.commentBox
                    })
                    .then((response) => {
                       this.comments.unshift(response.data);
                       this.commentBox = ''; 
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                }
            }
        });

    </script>
@endsection