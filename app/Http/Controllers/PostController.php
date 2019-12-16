<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(7);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=> 'required|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post' => 'required|max:255'
        ]);

        $p = new Post;
        $p->title = $validatedData['title']; 
        $p->post = $validatedData['post'];
        $p->user_id=auth()->id();
        if (!empty($validatedData['image'])){
        $p->image = $validatedData['image'];
        $imageName = $p->user_id.'.'.$p->title.'_image'.time().'.'.request()->image->getClientOriginalExtension();
        $p->image->storeAs('images',$imageName);
        $p->image = $imageName;
        }
        $p->save();

        session()->flash('message', 'Post was created.');
        return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = $post->user()->get()->first();
        $comments = $post->comments()->get();
        return view('posts.show', ['post' => $post, 'comments' => $comments, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $userRoles = User::findOrFail(auth()->id())->roles->pluck('name');

        $post = Post::findOrFail($post_id);
        if(auth()->id() == $post->user->id || $userRoles->contains('admin')){
            return view('posts.edit', ['post' => $post]);
        } else {
            return redirect()->route('nopermission');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title'=> 'required|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post' => 'required|max:255'
        ]);

        $post_id = $request->input('post_id');
        $p = Post::findOrFail($post_id);
        $p->title = $validatedData['title']; 
        $p->post = $validatedData['post'];
        $p->user_id=auth()->id();
        if (!empty($validatedData['image'])){
        $p->image = $validatedData['image'];
        $imageName = $p->user_id.'.'.$p->title.'_image'.time().'.'.request()->image->getClientOriginalExtension();
        $p->image->storeAs('images',$imageName);
        $p->image = $imageName;
        }
        $p->save();

        session()->flash('message', 'Post was edited.');
        return redirect()->route('posts.show', ['post_id' => $post_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $userRoles = User::findOrFail(auth()->id())->roles->pluck('name');

        if(auth()->id() == $post->user->id || $userRoles->contains('admin')){
            $post->delete();
            return redirect()->route('posts.index')->with('message', 'Post was deleted.');
        } else {
            return redirect()->route('nopermission');
        }

    }
}
